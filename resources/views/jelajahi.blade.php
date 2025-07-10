<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jelajahi Produk - Coffee Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fefcf9;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #6f4e37;
        }
        .navbar-brand, .nav-link, .navbar-text {
            color: #fff !important;
        }
        .hero {
            background: url('/images/banner-coffee.jpg') no-repeat center center;
            background-size: cover;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-shadow: 1px 1px 4px #000;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .section-title {
            font-weight: bold;
            margin-top: 60px;
            margin-bottom: 30px;
        }
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
            object-position: center;
            background-color: #fff;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
        .tips-box {
            background-color: #fff7ed;
            border-left: 5px solid #6f4e37;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Coffee Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/jelajahi"></a></li>
                <li class="nav-item"><a class="nav-link" href="/tentang">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">🛒 Keranjang</a></li>
            </ul>
            <span class="navbar-text me-3">Halo, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">@csrf
                <button class="btn btn-sm btn-light">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="hero">
    <h1>Jelajahi Dunia Kopi</h1>
</div>

<div class="container mt-5">
    <h2 class="section-title text-center">Produk Unggulan</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($featured as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                        <p class="fw-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="section-title text-center mt-5">Tips & Edukasi</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="tips-box">
                <h5>☕ Arabika vs Robusta</h5>
                <p>Arabika memiliki rasa lebih halus dan asam, sedangkan Robusta lebih pahit dan kuat. Cocok untuk espresso lovers!</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tips-box">
                <h5>📍 Kopi Lokal Indonesia</h5>
                <p>Dari Gayo, Toraja, hingga Flores, setiap daerah memiliki kekhasan rasa dan aroma yang khas. Yuk eksplor!</p>
            </div>
        </div>
    </div>

    <h2 class="section-title text-center mt-5">Semua Produk</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($allProducts as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 70) }}</p>
                        <p class="fw-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
