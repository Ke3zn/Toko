@extends('layout.app')
<!-- // Menggunakan layout utama aplikasi -->

@section('content')

{{-- ================= HEADER: JUDUL + SEARCH + TAMBAH PRODUK ================= --}}
<div class="row align-items-center mb-4">
    <div class="col-md-4">
        <h4 class="mb-0">Daftar Produk</h4>
    </div>

    <div class="col-md-5">
        <form method="GET" action="/products" class="d-flex">
            <input type="text"
                   name="search"
                   class="form-control me-2"
                   placeholder="Cari produk..."
                   value="{{ request('search') }}">
            <button class="btn btn-outline-primary">
                Cari
            </button>
        </form>
    </div>

    <div class="col-md-3 text-end">
        @if(auth()->user()->role === 'admin')
            <a href="/products/create" class="btn btn-primary">
                + Tambah Produk
            </a>
        @endif
    </div>
</div>

{{-- ================= LIST PRODUK ================= --}}
<div class="row">
@foreach($products as $p)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">

            <img src="{{ asset('storage/'.$p->image) }}"
                 class="card-img-top"
                 style="height:200px; object-fit:cover">

            <div class="card-body">

                <!-- ✅ ID PRODUK -->
                <p class="mb-1 text-muted small">
                    <strong>ID Produk:</strong> {{ $p->id }}
                </p>

                <h5 class="mb-1">{{ $p->name }}</h5>

                <p class="text-muted small mb-2">
                    {{ $p->description }}
                </p>

                <h6 class="fw-bold mb-2">
                    Rp {{ number_format($p->price) }}
                </h6>

                <p class="mb-1">
                    <strong>Sisa stok:</strong> {{ $p->stock }}
                </p>

                @if($p->stock == 0)
                    <span class="badge bg-danger">Stok Habis</span>
                @elseif($p->stock <= 5)
                    <span class="badge bg-warning text-dark">Stok Menipis</span>
                @else
                    <span class="badge bg-success">Stok Tersedia</span>
                @endif
            </div>

            <div class="card-footer bg-white border-0">

                @if($p->stock > 0)
                    <form action="/cart/add/{{ $p->id }}" method="POST">
                        @csrf
                        <button class="btn btn-success w-100 mb-2">
                            Tambah ke Keranjang
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary w-100 mb-2" disabled>
                        Stok Habis
                    </button>
                @endif

                @if(auth()->user()->role === 'admin')

                    <a href="/products/edit/{{ $p->id }}"
                       class="btn btn-warning w-100 mb-2">
                        Edit Produk
                    </a>

                    <form action="/products/delete/{{ $p->id }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger w-100">
                            Hapus Produk
                        </button>
                    </form>

                @endif

            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
