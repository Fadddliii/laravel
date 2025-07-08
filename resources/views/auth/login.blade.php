<!DOCTYPE html>
<html>
<head>
    <title>Login - Coffee Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('layouts.style')
</head>
<body>

<div class="container mt-5">
    <div class="auth-card mx-auto" style="max-width: 400px;">
        <h3 class="text-center auth-title">Login Pengguna</h3>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="contoh@kopi.com" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="******" required>
            </div>

            <button class="btn btn-coffee w-100">Masuk</button>
        </form>

        <div class="text-center mt-3">
            Belum punya akun? <a href="/register" class="link-coffee">Daftar di sini</a>
        </div>
    </div>
</div>

</body>
</html>
