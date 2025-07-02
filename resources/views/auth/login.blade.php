<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - Mitra Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #5e0035;
            /* maroon tua */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
        }

        .login-wrapper {
            display: flex;
            height: 100vh;
        }

        .login-image {
            flex: 1;
            background: url('{{ asset('assets/image/mitra.png') }}') no-repeat center center;
            background-size: contain;
        }

        .login-form {
            flex: 1;
            background-color: #f2eee5;
            padding: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Vertikal tengah */
        }

        .login-box {
            width: 100%;
            max-width: 320px;
            /* Ubah dari 400px jadi 320px seperti di gambar */
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-box h3 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn-maroon {
            background-color: #73002e;
            color: white;
        }

        .btn-maroon:hover {
            background-color: #5e0026;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-image"></div>
        <div class="login-form">
            <div class="login-box">
                <h3>Mitra Marketplace</h3>
                <h3 class="mb-4 text-center fs-4">Login</h3>

                <form method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    @if ($errors->has('login_gagal'))
                        <div class="alert alert-danger">{{ $errors->first('login_gagal') }}</div>
                    @endif

                    <button type="submit" class="btn btn-maroon w-100">Login</button>

                    <div style="margin-top: 10px; text-align: center;">
                        <p>AKSES DEMO</p>
                        <p>username : admin</p>
                        <p>password : admin123</p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>