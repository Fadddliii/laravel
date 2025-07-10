@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Formulir Pembelian</h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        
        <div class="mb-3">
            <label>Nama Produk:</label>
            <input type="text" class="form-control" value="{{ $product->name }}" disabled>
        </div>

        <div class="mb-3">
            <label>Nama Anda:</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat:</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Jumlah:</label>
            <input type="number" name="quantity" class="form-control" value="1" min="1" required>
        </div>

        <button class="btn btn-success">Beli Sekarang</button>
    </form>
</div>
@endsection
