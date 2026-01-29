<?php

namespace App\Http\Controllers;

use App\Models\Cart;              // Model Cart (tabel keranjang)
use Illuminate\Http\Request;      // Untuk menangkap data dari form

class CartController extends Controller
{
    // ================= MENAMPILKAN KERANJANG USER =================
    public function index()
    {
        return view('cart.index', [
            // Ambil semua item keranjang milik user yang sedang login
            'carts' => Cart::where('user_id', auth()->id())->get()
        ]);
    }

    // ================= TAMBAH PRODUK KE KERANJANG =================
    public function add($id)
    {
        // Cek apakah produk sudah ada di keranjang user
        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            // Jika sudah ada, tambah jumlah (qty)
            $cart->increment('qty');
        } else {
            // Jika belum ada, buat item keranjang baru
            Cart::create([
                'user_id'    => auth()->id(), // User pemilik keranjang
                'product_id' => $id,          // Produk yang ditambahkan
                'qty'        => 1              // Jumlah awal
            ]);
        }

        // Kembali ke halaman sebelumnya
        return back();
    }

    // ================= UPDATE JUMLAH PRODUK =================
    public function updateQty(Request $request, $id)
    {
        // Update qty item keranjang milik user
        Cart::where('id', $id)
            ->where('user_id', auth()->id())
            ->update([
                'qty' => $request->qty // Jumlah baru dari form
            ]);

        return back();
    }

    // ================= HAPUS ITEM DARI KERANJANG =================
    public function delete($id)
    {
        // Hapus item keranjang berdasarkan ID
        Cart::findOrFail($id)->delete();

        // Kembali ke halaman keranjang
        return back();
    }
}
