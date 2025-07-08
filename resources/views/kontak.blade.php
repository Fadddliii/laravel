<!DOCTYPE html>
<html>
<head>
    <title>Kontak - Coffee Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        body { background-color: #f6f2eb; font-family: 'Segoe UI', sans-serif; margin: 0; }
        .navbar { background-color: #6f4e37; }
        .navbar-brand, .nav-link, .navbar-text { color: #fff !important; }
        .section-content { padding: 100px 0; text-align: center; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Coffee Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navKontak">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navKontak">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/tentang">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link active" href="/kontak">Kontak</a></li>
            </ul>
            <span class="navbar-text me-3">Halo, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">@csrf <button class="btn btn-sm btn-light">Logout</button></form>
        </div>
    </div>
</nav>

<div class="section-content bg-white mt-5">
    <div class="container">
        <h1 class="mb-4">Kontak</h1>
        <p class="lead">Hubungi kami melalui email: <strong>info@coffeeco.id</strong> atau WA: 0812-3456-7890</p>
    </div>
</div>
</body>
</html>
