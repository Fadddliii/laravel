<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    // Tampilkan isi keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Tambah produk ke keranjang
    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang.');
    }

    // Perbarui jumlah setiap item
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->product_id as $id => $qty) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = max(1, (int)$qty);
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Keranjang diperbarui.');
    }

    // Hapus satu item dari keranjang
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }
    public function destroy(Request $request)
{
    // logika untuk menghapus item dari cart, misalnya berdasarkan ID
    // Contoh:
    // Cart::where('id', $request->id)->delete();

    return redirect()->back()->with('success', 'Item berhasil dihapus dari cart.');
}


    // Checkout: simpan semua item di keranjang ke tabel orders
    public function checkout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'address'       => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        foreach ($cart as $item) {
            Order::create([
                'customer_name' => $request->customer_name,
                'address'       => $request->address,
                'product_name'  => $item['name'],
                'quantity'      => $item['quantity'],
                'total_price'   => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect('/produk')->with('success', 'Pesanan berhasil dibuat!');
    }
    public function clear()
{
    session()->forget('cart');
    return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan.');
}
public function history()
{
    $orders = Order::latest()->get(); // atau filter sesuai user kalau sudah autentikasi real
    return view('cart.history', compact('orders'));
}


}

