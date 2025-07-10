<!DOCTYPE html>
<html>
<head>
    <title>Beranda - Coffee Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        body {
            margin: 0;
            background-color: #f6f2eb;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #6f4e37;
        }

        .navbar-brand, .nav-link, .navbar-text {
            color: #fff !important;
        }

        .hero {
            height: 100vh;
            width: 100%;
            background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1400&q=80') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
        }

        .hero p {
            font-size: 1.3rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
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
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Coffee Company</a>

        <!-- Hamburger Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCoffee" aria-controls="navbarCoffee" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarCoffee">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/jelajahi"></a></li>
                <li class="nav-item"><a class="nav-link" href="/tentang">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">🛒 Keranjang</a></li>
            </ul>

            <div class="d-flex align-items-center">
                <span class="navbar-text me-3">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-light">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section Fullscreen -->
<section class="hero">
    <div class="container">
        <h1>Selamat Datang di Perusahaan Kopi</h1>
        <p>Kami menyajikan kopi terbaik dari petani lokal Indonesia.</p>
        <a href="/jelajahi" class="btn btn-coffee mt-3">Jelajahi Produk</a>
    </div>
</section>

</body>
</html>
