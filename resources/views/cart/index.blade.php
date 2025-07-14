@extends('layouts.app')

@push('styles')
<style>

.hero {
    height: 100vh; /* Fullscreen seperti homepage */
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}
.btn-coffee {
    background-color: #6f4e37;
    color: white;
    border: none;
    padding: 10px 24px;
    font-size: 1rem;
    border-radius: 6px;
    transition: 0.3s ease;
}
.btn-coffee:hover {
    background-color: #5a3f2d;
}
body {
    overflow: hidden;
}

</style>
@endpush

@section('title', 'Keranjang Belanja')

@section('content')

    <div class="container mt-5 mb-5">
        <h2 class="mb-4 text-center">Detail Keranjang</h2>

        @if(session('cart') && count($cart))
            {{-- Form Update --}}
            <form method="POST" action="{{ route('cart.update') }}">
                @csrf
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th style="width:120px">Jumlah</th>
                            <th>Total</th>
                            <th style="width:100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $id => $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/' . $item['image']) }}"
                                             style="width:60px; height:60px; object-fit:contain; margin-right:12px;"
                                             alt="{{ $item['name'] }}">
                                        <span>{{ $item['name'] }}</span>
                                    </div>
                                </td>
                                <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td>
                                    <input type="number"
                                           name="product_id[{{ $id }}]"
                                           value="{{ $item['quantity'] }}"
                                           min="1"
                                           class="form-control">
                                </td>
                                <td>Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger w-100">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-warning">Perbarui Keranjang</button>
                    <button class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#checkoutForm">Checkout</button>
                </div>
                
                <form action="{{ route('cart.clear') }}" method="POST" class="mt-2" onsubmit="return confirm('Yakin ingin mengosongkan seluruh keranjang?')">
                    @csrf
                    <button class="btn btn-outline-danger">Hapus Semua</button>
                </form>
                

            </form>

            <hr class="my-5">

            {{-- Form Checkout --}}
            <h4 class="mb-3">Isi Data Pengiriman</h4>
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="customer_name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Alamat Pengiriman</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-coffee mt-4">Checkout Sekarang</button>
            </form>
        @else
            <div class="alert alert-info text-center">
                Keranjang Anda masih kosong. <a href="/produk" class="btn btn-coffee">Mulai Belanja</a>
            </div>
        @endif
    </div>
@endsection
