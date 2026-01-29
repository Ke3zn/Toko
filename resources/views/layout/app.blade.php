<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Supermarket</title>

    <!-- // Membuat tampilan responsif di semua device -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- // Import Bootstrap untuk styling UI -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* // Warna background utama aplikasi */
        body {
            background-color: #f5f7fa;
        }
        /* // Membuat card lebih halus */
        .card {
            border-radius: 12px;
        }
        /* // Styling teks brand navbar */
        .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

<!-- // Navbar utama aplikasi -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <!-- // Logo / nama aplikasi -->
        <a class="navbar-brand" href="/dashboard">🛒 TOKO</a>

        <!-- // Tombol hamburger untuk mobile -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- // Menu navigasi -->
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto">
                <!-- // Link ke halaman produk -->
                <li class="nav-item"><a class="nav-link" href="/products">Produk</a></li>
                <!-- // Link ke keranjang -->
                <li class="nav-item"><a class="nav-link" href="/cart">Keranjang</a></li>
                <!-- // Link ke riwayat transaksi -->
                <li class="nav-item"><a class="nav-link" href="/orders">Transaksi</a></li>
            </ul>

            <!-- // Menampilkan nama user yang sedang login -->
            <span class="text-white me-3">
                {{ auth()->user()->name }}
            </span>

            <!-- // Form logout (POST untuk keamanan) -->
            <form action="/logout" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>

<!-- // Area konten utama halaman -->
<div class="container py-4">
    @yield('content')
    <!-- // Isi halaman akan dimasukkan dari blade lain -->
</div>

<!-- // Script Bootstrap (wajib untuk navbar & komponen JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
