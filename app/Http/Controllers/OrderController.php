<?php

namespace App\Http\Controllers;

use App\Models\Cart;          
use App\Models\Order;         
use App\Models\OrderItem;     
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    // ================= PROSES CHECKOUT =================
    public function checkout()
    {
        $userId = auth()->id();

        $carts = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kosong');
        }

        DB::beginTransaction();

        try {
            $total = 0;

            // CEK STOK & HITUNG TOTAL
            foreach ($carts as $c) {
                if ($c->product->stock < $c->qty) {
                    DB::rollBack();
                    return back()->with(
                        'error',
                        'Stok produk "' . $c->product->name . '" tidak mencukupi'
                    );
                }

                $total += $c->product->price * $c->qty;
            }

            // SIMPAN ORDER
            $order = Order::create([
                'user_id' => $userId,
                'total'   => $total
            ]);

            // SIMPAN ITEM + KURANGI STOK
            foreach ($carts as $c) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $c->product_id,
                    'qty'        => $c->qty,
                    'price'      => $c->product->price
                ]);

                $c->product->decrement('stock', $c->qty);
            }

            Cart::where('user_id', $userId)->delete();

            DB::commit();

            return redirect('/orders')->with('success', 'Checkout berhasil');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Checkout gagal');
        }
    }

    
 //check invoice
 
    public function invoicePdf($id)
{
    $order = Order::with('items.product','user')->findOrFail($id);

    $pdf = Pdf::loadView('invoice.pdf', compact('order'));

    return $pdf->download('invoice-order-'.$order->id.'.pdf');
}

    // ================= RIWAYAT TRANSAKSI USER =================
    public function history()
    {
        return view('order.history', [

            // ✅ LOAD relasi user + items + product
            'orders' => Order::with(['user', 'items.product'])
                ->where('user_id', auth()->id())
                ->latest()
                ->get()
        ]);
    }
}
