<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('order.form', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'address' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $total = $product->price * $request->quantity;

        Order::create([
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'product_name' => $product->name,
            'quantity' => $request->quantity,
            'total_price' => $total,
        ]);

        return redirect('/produk')->with('success', 'Pesanan berhasil dibuat!');
    }
}
