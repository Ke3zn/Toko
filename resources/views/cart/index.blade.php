@extends('layout.app') 
<!-- // Menggunakan layout utama aplikasi -->

@section('content')
<h4 class="mb-3">Keranjang Belanja</h4>
<!-- // Judul halaman keranjang -->

<div class="card shadow-sm">
<div class="card-body">

<table class="table">
    <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
        <th>Aksi</th>
    </tr>

@php $total = 0; @endphp
<!-- // Variabel untuk menghitung total harga -->

@foreach($carts as $c)
@php
    // Hitung subtotal per item (harga x qty)
    $sub = $c->product->price * $c->qty;
    // Tambahkan ke total
    $total += $sub;
@endphp
<tr>
    <!-- // Nama produk -->
    <td>{{ $c->product->name }}</td>

    <!-- // Harga satuan produk -->
    <td>Rp {{ number_format($c->product->price) }}</td>

    <td>
        <!-- // Form untuk update jumlah (qty) produk -->
        <form method="POST" action="/cart/update/{{ $c->id }}">
            @csrf
            <!-- // Input jumlah produk -->
            <input type="number" name="qty" value="{{ $c->qty }}" min="1"
                   class="form-control" style="width:80px">
            <!-- // Tombol update qty -->
            <button class="btn btn-sm btn-primary mt-1">Update</button>
        </form>
    </td>

    <!-- // Subtotal harga per item -->
    <td>Rp {{ number_format($sub) }}</td>

    <td>
        <!-- // Form hapus item keranjang (method DELETE) -->
        <form action="/cart/delete/{{ $c->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <!-- // Tombol hapus dengan konfirmasi -->
            <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin ingin menghapus item ini?')">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</table>

<!-- // Menampilkan total seluruh belanja -->
<h5 class="text-end">Total: Rp {{ number_format($total) }}</h5>

<div class="text-end">
    <!-- // Form checkout (POST ke OrderController) -->
    <form action="/checkout" method="POST">
        @csrf
        <!-- // Tombol untuk proses checkout -->
        <button type="submit" class="btn btn-success">
            Checkout
        </button>
    </form>
</div>

</div>
</div>
@endsection
