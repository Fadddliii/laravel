<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Coffee Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f5f0; }
        footer { background: #222; color: white; padding: 20px; margin-top: 40px; text-align: center; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">☕ Coffee Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer>&copy; {{ date('Y') }} Coffee Company</footer>
</body>
</html>
