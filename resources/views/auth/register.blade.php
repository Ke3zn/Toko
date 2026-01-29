<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- // Wajib agar responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- // Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* // Background gambar supermarket + overlay gelap */
        body {
            min-height: 100vh;
            background:
                linear-gradient(
                    rgba(0,0,0,0.55),
                    rgba(0,0,0,0.55)
                ),
                url('https://www.total-erp.com/wp-content/uploads/2023/03/blog-supermarket-inventory-management-1-optimal-6337ffe824ed442ec53241d2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        /* // Card register */
        .register-card {
            width: 100%;
            max-width: 400px;
            background: rgba(255,255,255,0.95);
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
            padding: 30px;
        }

        /* // Judul halaman */
        .register-title {
            font-weight: 700;
            text-align: center;
            margin-bottom: 5px;
        }

        .register-subtitle {
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 25px;
        }

        /* // Tombol register */
        .btn-register {
            border-radius: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="register-card">

    <!-- // Judul -->
    <h4 class="register-title">🛒 Register</h4>
    <div class="register-subtitle">
        Buat akun baru untuk mulai berbelanja
    </div>

    <!-- // Form register -->
    <form method="POST" action="/register">
        @csrf

        <!-- // Input nama -->
        <div class="mb-3">
            <input name="name"
                   class="form-control"
                   placeholder="Nama"
                   required>
        </div>

        <!-- // Input email -->
        <div class="mb-3">
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Email"
                   required>
        </div>

        <!-- // Input password -->
        <div class="mb-3">
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Password"
                   required>
        </div>

        <!-- // Tombol register -->
        <button class="btn btn-success btn-register w-100">
            Register
        </button>
    </form>

    <!-- // Link ke login -->
    <div class="text-center mt-3">
        <a href="/login">Sudah punya akun?</a>
    </div>

</div>

</body>
</html>
