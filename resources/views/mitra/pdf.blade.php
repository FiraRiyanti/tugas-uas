<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Mitra</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Data Mitra Marketplace</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Toko</th>
                <th>Jenis Produk</th>
                <th>Kota</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mitras as $mitra)
            <tr>
                <td>{{ $mitra->id }}</td>
                <td>{{ $mitra->nama_toko }}</td>
                <td>{{ $mitra->jenis_produk }}</td>
                <td>{{ $mitra->kota }}</td>
                <td>{{ $mitra->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
