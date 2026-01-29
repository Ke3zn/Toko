<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Toko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        /* ================= HERO ================= */
        .hero {
            min-height: 100vh;
            background:
                linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                url('https://live-production.wcms.abc-cdn.net.au/b50f0ba0535e5bc0dc6bcb0ade90a517?impolicy=wcms_crop_resize&cropH=2268&cropW=4032&xPos=0&yPos=378&width=862&height=485');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            align-items: center;
        }

        /* ================= ANIMASI ================= */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: 1s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* ================= ABOUT ================= */
        .about-section {
            padding: 100px 0;
            background: #f8f9fa;
        }

        .about-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            margin-bottom: 80px;
            max-width: 500px;
        }

        .about-left {
            margin-left: 0;
        }

        .about-right {
            margin-left: auto;
        }
    </style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">🛒 Toko</a>

        <div class="ms-auto">
            @auth
                <a href="/dashboard" class="btn btn-success btn-sm">Dashboard</a>
            @else
            @endauth
        </div>
    </div>
</nav>

<!-- ================= HERO ================= -->
<section class="hero">
    <div class="container text-center">
        <h1 class="display-5 fw-bold mb-3 reveal">
            Sistem Pembelian & Penjualan Toko
        </h1>

        <p class="lead mb-4 reveal">
            Kelola produk, transaksi, dan riwayat pembelian dengan mudah dan cepat.
        </p>

        <div class="reveal">
            <a href="/login" class="btn btn-primary btn-lg me-2">
                Login
            </a>
            <a href="/register" class="btn btn-outline-light btn-lg">
                Daftar Akun
            </a>
        </div>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section class="about-section">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold reveal">Tentang Toko Kami</h2>
            <p class="text-muted reveal">
                Informasi lengkap mengenai sistem dan layanan toko
            </p>
        </div>

        <!-- ITEM 1 -->
        <div class="about-card about-left reveal">
            <h5>📦 Manajemen Produk</h5>
            <p>
                mengelola data produk, stok, harga, dan gambar produk .
            </p>
        </div>

        <!-- ITEM 2 -->
        <div class="about-card about-right reveal">
            <h5>🛒 Transaksi Cepat</h5>
            <p>
                Checkout yang mudah dengan perhitungan total dan pengurangan stok secara real-time.
            </p>
        </div>

        <!-- ITEM 3 -->
        <div class="about-card about-left reveal">
            <h5>📊 Riwayat Transaksi</h5>
            <p>
               Dapat melihat riwayat transaksi
            </p>
        </div>

    </div>
</section>

<!-- ================= SCRIPT ================= -->
<script>
    function revealOnScroll() {
        const reveals = document.querySelectorAll('.reveal');
        const windowHeight = window.innerHeight;

        reveals.forEach(el => {
            const elementTop = el.getBoundingClientRect().top;
            if (elementTop < windowHeight - 100) {
                el.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', revealOnScroll);
</script>

</body>
</html>
