<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Coffee Company')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-light">
    @if(session('success'))
    <div class="alert alert-success mt-3 text-center">
        {{ session('success') }}
    </div>
@endif


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Coffee Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('jelajahi*') ? 'active' : '' }}" href="/jelajahi"></a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="/tentang">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="{{ route('cart.index') }}">
                        🛒 Keranjang ({{ session('cart') ? count(session('cart')) : 0 }})
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                @auth
                    <span class="navbar-text me-3">Halo, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main class="pt-5 mt-4">
    @yield('content')
</main>

</body>
</html>
