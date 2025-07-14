@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Riwayat Pembelian</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center">Belum ada pembelian.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
