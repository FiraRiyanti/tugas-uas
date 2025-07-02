@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Dashboard</h2>

        <div class="alert alert-info">
            Selamat datang, <strong>{{ session('nama') }}</strong>! Anda login sebagai admin.
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        Total Mitra
                        <h3>{{ $totalMitra }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        Aktif
                        <h3>{{ $mitraAktif }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        Tidak Aktif
                        <h3>{{ $mitraTidakAktif }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Grafik Status Mitra</h5>
            <canvas id="mitraChart" height="100"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('mitraChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Aktif', 'Tidak Aktif'],
                datasets: [{
                    label: 'Jumlah Mitra',
                    data: [{{ $mitraAktif }}, {{ $mitraTidakAktif }}],
                    backgroundColor: [
                        'rgba(40, 167, 69, 0.7)',   // Hijau
                        'rgba(220, 53, 69, 0.7)'    // Merah
                    ],
                    borderColor: [
                        'rgba(40, 167, 69, 1)',
                        'rgba(220, 53, 69, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>

@endsection