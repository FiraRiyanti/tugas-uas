<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Mitra Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2eee5;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100vh;
            background-color: #5e0035;
            padding-top: 20px;
            color: white;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #73002e;
            border-radius: 5px;
        }

        .logout {
            color: #ffcdd2;
        }

        .main-content {
            margin-left: 220px;
            padding: 30px;
        }

        .navbar-dashboard {
            background-color: transparent;
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/image/logo.png') }}" alt="Logo" width="90">
        </div>
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ route('mitra.index') }}">Data Mitra</a>
        <a href="{{ route('logout') }}" class="logout">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center navbar-dashboard">
            <h4>Sistem Mitra Marketplace</h4>
            <div>
                Selamat Datangg <strong>{{ session('nama') }}</strong>
            </div>
        </div>

        @yield('content')
    </div>

</body>
</html>
