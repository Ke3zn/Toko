<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ================= BACKGROUND ================= */
        body {
            min-height: 100vh;
            background:
                linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
                url('https://www.total-erp.com/wp-content/uploads/2023/03/blog-supermarket-inventory-management-1-optimal-6337ffe824ed442ec53241d2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ================= CARD LOGIN ================= */
        .login-card {
            width: 100%;
            max-width: 380px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
            padding: 30px;
        }

        /* ================= INPUT ================= */
        .login-card input {
            border-radius: 10px;
            padding: 12px;
        }

        .login-card input:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(25,135,84,.25);
        }

        /* ================= ANIMASI GETAR ================= */
        .shake {
            animation: shake 0.4s;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            50% { transform: translateX(6px); }
            75% { transform: translateX(-6px); }
            100% { transform: translateX(0); }
        }

        /* ================= TEKS ================= */
        .login-title {
            font-weight: 700;
            text-align: center;
        }

        .login-subtitle {
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        /* ================= TOMBOL ================= */
        .btn-login {
            background: linear-gradient(135deg, #198754, #2fbf71);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 12px;
            color: #fff;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #157347, #28a745);
        }

        /* ================= LINK ================= */
        .login-card a {
            color: #198754;
            font-weight: 500;
        }

        .login-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="login-card {{ session('error') ? 'shake' : '' }}">

    <!-- Judul -->
    <h4 class="login-title">🛒 Login</h4>
    <div class="login-subtitle">
        Sistem Pembelian dan Penjualan Toko
    </div>

    <!-- NOTIF ERROR -->
    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form login -->
    <form method="POST" action="/login">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Email"
                   required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Password"
                   required>
        </div>

        <!-- Tombol login -->
        <button class="btn btn-login w-100">
            Login
        </button>
    </form>

    <!-- Link register -->
    <div class="text-center mt-3">
        <a href="/register">Belum punya akun?</a>
    </div>

</div>

</body>
</html>
