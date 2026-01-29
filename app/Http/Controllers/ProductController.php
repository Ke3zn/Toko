<?php

namespace App\Http\Controllers;

use App\Models\Product;                // Model Product (tabel products)
use Illuminate\Http\Request;            // Untuk menangkap data dari form
use Illuminate\Support\Facades\Storage; // Untuk upload & hapus file gambar

class ProductController extends Controller
{
    // ================= MENAMPILKAN LIST PRODUK + SEARCH =================
    public function index(Request $request)
    {
        $query = Product::query(); // Membuat query awal produk

        // Jika ada input search, lakukan pencarian berdasarkan nama produk
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Kirim data produk ke view
        return view('product.index', [
            'products' => $query->get()
        ]);
    }

    // ================= FORM TAMBAH PRODUK =================
    public function create()
    {
        // Menampilkan halaman form tambah produk
        return view('product.create');
    }

    // ================= SIMPAN PRODUK BARU =================
    public function store(Request $r)
    {
        // Upload gambar ke storage/public/products
        $img = $r->file('image')->store('products', 'public');

        // Simpan data produk ke database
        Product::create([
            'name'        => $r->name,        // Nama produk
            'price'       => $r->price,       // Harga produk
            'description' => $r->description,// Deskripsi produk
            'image'       => $img,             // Path gambar
            'stock'       => $r->stock         // Stok produk
        ]);

        // Setelah simpan, kembali ke halaman produk
        return redirect('/products');
    }

    // ================= FORM EDIT PRODUK =================
    public function edit($id)
    {
        // Ambil data produk berdasarkan ID
        return view('product.edit', [
            'product' => Product::findOrFail($id)
        ]);
    }

    // ================= UPDATE DATA PRODUK =================
    public function update(Request $r, $id)
    {
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Jika ada gambar baru, hapus gambar lama dan upload yang baru
        if ($r->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $img = $r->file('image')->store('products', 'public');
            $product->image = $img;
        }

        // Update data produk (selain gambar)
        $product->update([
            'name'        => $r->name,        // Nama produk
            'price'       => $r->price,       // Harga produk
            'description' => $r->description,// Deskripsi produk
            'stock'       => $r->stock        // Stok produk
        ]);

        // Kembali ke halaman produk
        return redirect('/products');
    }

    // ================= HAPUS PRODUK =================
    public function delete($id)
    {
        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Hapus data produk dari database
        $product->delete();

        // Redirect dengan pesan sukses
        return redirect('/products')->with('success', 'Produk berhasil dihapus');
    }
}
