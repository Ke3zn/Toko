@extends('layout.app')
<!-- // Menggunakan layout utama aplikasi -->

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        <!-- // Judul halaman edit produk -->
        <h4>Edit Produk</h4>

        <!-- // Form untuk update data produk -->
        <!-- // enctype multipart/form-data WAJIB jika ada upload gambar -->
        <form method="POST" action="/products/update/{{ $product->id }}" enctype="multipart/form-data">
            @csrf
            <!-- // Token keamanan Laravel -->

            <!-- // Input nama produk (diisi data lama) -->
            <input name="name" class="form-control mb-2"
                   value="{{ $product->name }}" required>

            <!-- // Input harga produk (diisi data lama) -->
            <input name="price" class="form-control mb-2"
                   value="{{ $product->price }}" required>

            <!-- // Input deskripsi produk (diisi data lama) -->
            <textarea name="description" class="form-control mb-2"
                      required>{{ $product->description }}</textarea>

            <!-- // Menampilkan gambar produk lama -->
            <p>Gambar lama:</p>
            <img src="{{ asset('storage/'.$product->image) }}" width="120" class="mb-2">

            <!-- // Upload gambar baru (opsional) -->
            <input type="file" name="image" class="form-control mb-3">

            <!-- // Input stok produk (diisi data lama) -->
            <input type="number" name="stock"
                   class="form-control mb-2"
                   value="{{ $product->stock }}"
                   min="0" required>

            <!-- // Tombol update produk -->
            <button class="btn btn-primary">Update</button>

            <!-- // Tombol kembali ke halaman produk -->
            <a href="/products" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
