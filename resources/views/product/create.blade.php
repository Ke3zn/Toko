@extends('layout.app')
<!-- // Menggunakan layout utama aplikasi -->

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        <!-- // Judul halaman tambah produk -->
        <h4>Tambah Produk</h4>

        <!-- // Informasi bahwa ID produk dibuat otomatis oleh sistem -->
        <div class="alert alert-info">
            ID Produk akan dibuat otomatis oleh sistem setelah produk disimpan
        </div>

        <!-- // Form untuk menyimpan produk baru -->
        <!-- // enctype multipart/form-data WAJIB untuk upload gambar -->
        <form method="POST" action="/products" enctype="multipart/form-data">
            @csrf
            <!-- // Token keamanan Laravel -->

            <!-- // Input nama produk -->
            <input name="name" class="form-control mb-2" placeholder="Nama Produk" required>

            <!-- // Input harga produk -->
            <input name="price" class="form-control mb-2" placeholder="Harga" required>

            <!-- // Input stok produk -->
            <input name="stock" type="number" class="form-control mb-2" placeholder="Stok" required>

            <!-- // Input deskripsi produk -->
            <textarea name="description" class="form-control mb-2" placeholder="Deskripsi"></textarea>

            <!-- // Input upload gambar produk -->
            <input type="file" name="image" class="form-control mb-3" required>

            <!-- // Tombol simpan produk -->
            <button class="btn btn-success">Simpan</button>

            <!-- // Tombol kembali ke halaman produk -->
            <a href="/products" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
