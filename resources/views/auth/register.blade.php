<!DOCTYPE html>
<html>
<head>
    <title>Register - Coffee Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('layouts.style')
</head>
<body>

<div class="container mt-5">
    <div class="auth-card mx-auto" style="max-width: 400px;">
        <h3 class="text-center auth-title">Daftar Pengguna</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="email@kopi.com" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="******" required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="******" required>
            </div>

            <button class="btn btn-coffee w-100">Daftar</button>
        </form>

        <div class="text-center mt-3">
            Sudah punya akun? <a href="/login" class="link-coffee">Login di sini</a>
        </div>
    </div>
</div>

</body>
</html>
