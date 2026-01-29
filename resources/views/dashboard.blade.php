@extends('layout.app')
<!-- // Menggunakan layout utama aplikasi -->

@section('content')
<div class="row">

    <!-- ================= HEADER DASHBOARD ================= -->
    <div class="col-md-12 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">

                <!-- // Judul halaman dashboard -->
                <h4 class="mb-1">Dashboard</h4>

                <!-- // Menampilkan nama user yang sedang login -->
                <p class="text-muted mb-0">
                    Selamat datang, <strong>{{ auth()->user()->name }}</strong>
                </p>

            </div>
        </div>
    </div>

    <!-- ================= JUMLAH PRODUK ================= -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">

                <!-- // Label informasi -->
                <h6 class="text-muted">Produk</h6>

                <!-- // Menghitung total produk di database -->
                <h3>{{ \App\Models\Product::count() }}</h3>

            </div>
        </div>
    </div>

    <!-- ================= JUMLAH ITEM KERANJANG ================= -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">

                <!-- // Label informasi -->
                <h6 class="text-muted">Keranjang</h6>

                <!-- // Menghitung jumlah item keranjang milik user -->
                <h3>{{ \App\Models\Cart::where('user_id', auth()->id())->count() }}</h3>

            </div>
        </div>
    </div>

    <!-- ================= JUMLAH TRANSAKSI ================= -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">

                <!-- // Label informasi -->
                <h6 class="text-muted">Transaksi</h6>

                <!-- // Menghitung jumlah transaksi milik user -->
                <h3>{{ \App\Models\Order::where('user_id', auth()->id())->count() }}</h3>

            </div>
        </div>
    </div>

</div>
@endsection 