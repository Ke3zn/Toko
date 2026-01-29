<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:6px; }
        th { background:#f0f0f0; }
    </style>
</head>
<body>

<h2>INVOICE TRANSAKSI</h2>

<p>
    <strong>Invoice ID:</strong> {{ $order->id }} <br>
    <strong>User ID:</strong> {{ $order->user->id }} <br>
    <strong>Nama User:</strong> {{ $order->user->name }} <br>
    <strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}
</p>

<table>
    <tr>
        <th>ID Produk</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>

    @foreach($order->items as $item)
    <tr>
        <td>{{ $item->product->id }}</td>
        <td>{{ $item->product->name }}</td>
        <td>Rp {{ number_format($item->price) }}</td>
        <td>{{ $item->qty }}</td>
        <td>Rp {{ number_format($item->price * $item->qty) }}</td>
    </tr>
    @endforeach
</table>

<h3 style="text-align:right;">
    Total: Rp {{ number_format($order->total) }}
</h3>

</body>
</html>
