@extends('layout.app')
<!-- // Menggunakan layout utama aplikasi -->

@section('content')
<h4 class="mb-3">Riwayat Transaksi</h4>
<!-- // Judul halaman riwayat transaksi -->

@forelse($orders as $o)
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <!-- // Menampilkan tanggal dan waktu transaksi -->
        <h6 class="mb-2">
            Tanggal: {{ $o->created_at->format('d M Y H:i') }}
        </h6>

        <!-- // Tabel detail item dalam satu transaksi -->
        <table class="table table-bordered">
            <tr>
                <th>ID Produk</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>

            @foreach($o->items as $item)
            <tr>
                <!-- // ID PRODUK -->
                <td>{{ $item->product->id ?? '-' }}</td>

                <!-- // Nama produk -->
                <td>{{ $item->product->name ?? 'Produk tidak tersedia' }}</td>

                <!-- // Harga satuan -->
                <td>Rp {{ number_format($item->price) }}</td>

                <!-- // Jumlah beli -->
                <td>{{ $item->qty }}</td>

                <!-- // Subtotal -->
                <td>Rp {{ number_format($item->price * $item->qty) }}</td>
            </tr>
            @endforeach
        </table>

        <!-- // Total pembayaran -->
        <div class="text-end fw-bold">
            Total: Rp {{ number_format($o->total) }}
        </div>

        <!-- ✅ TOMBOL DOWNLOAD INVOICE (PENEMPATAN YANG BENAR) -->
        <div class="text-end mt-2">
            <a href="/invoice/{{ $o->id }}" class="btn btn-sm btn-outline-primary">
                Download Invoice (PDF)
            </a>
        </div>

    </div>
</div>
@empty
<!-- // Jika belum ada transaksi -->
<div class="alert alert-info">
    Belum ada riwayat transaksi.
</div>
@endforelse
@endsection
