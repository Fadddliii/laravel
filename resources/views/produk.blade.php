<!DOCTYPE html>
<html>
<head>
    <title>Produk - Coffee Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        body {
            background-color: #f6f2eb;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }
        .navbar {
            background-color: #6f4e37;
        }
        .navbar-brand, .nav-link, .navbar-text {
            color: #fff !important;
        }
        .section-content {
            padding: 80px 0 30px;
            text-align: center;
        }
        .btn-coffee {
            background-color: #6f4e37;
            color: white;
            border: none;
        }
        .btn-coffee:hover {
            background-color: #5a3f2d;
        }
        .card-title {
            font-weight: bold;
        }
        .card-text small {
            color: #6c757d;
        }
        .product-img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            object-position: center;
            background-color: #fff;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
        .card.h-100 {
            border-radius: 0.5rem;
            overflow: hidden;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Coffee Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navProduk">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navProduk">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link active" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/jelajahi">  </a></li>
                <li class="nav-item"><a class="nav-link" href="/tentang">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        🛒 Keranjang ({{ session('cart') ? count(session('cart')) : 0 }})
                    </a>
                </li>
            </ul>
            <span class="navbar-text me-3">Halo, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-light">Logout</button>
            </form>
        </div>
    </div>
</nav>

<!-- Konten Produk -->
<div class="section-content bg-white mt-5">
    <div class="container">
        <h1 class="mb-4">Produk Kami</h1>
        <p class="lead">Kami menyediakan berbagai jenis kopi berkualitas: Arabika, Robusta, dan Signature Blend yang khas.</p>

        <!-- Filter dan Search -->
        <form method="GET" action="/produk" class="row mb-4 g-2 justify-content-center">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari kopi..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">Semua Kategori</option>
                    <option value="Arabika" {{ request('category') == 'Arabika' ? 'selected' : '' }}>Arabika</option>
                    <option value="Robusta" {{ request('category') == 'Robusta' ? 'selected' : '' }}>Robusta</option>
                    <option value="Premium" {{ request('category') == 'Premium' ? 'selected' : '' }}>Premium</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-coffee w-100">Filter</button>
            </div>
        </form>

        <!-- Produk List -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/' . $product->image) }}" class="img-fluid product-img" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><small>Kategori: {{ $product->category }}</small></p>
                            <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                            <p class="fw-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

                            <!-- Tombol Beli Sekarang -->
                            <a href="{{ route('order.create', $product->id) }}" class="btn btn-sm btn-coffee mt-2 w-100">Beli Sekarang</a>

                            <!-- Tombol Masukkan ke Keranjang -->
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary mt-2 w-100">Masukkan ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center mt-4">Produk tidak ditemukan.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
</div>

</body>
</html>
