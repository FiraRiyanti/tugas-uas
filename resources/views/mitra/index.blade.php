@extends('layout')

@section('content')

<style>
    .table-container {
        background-color: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .table thead th {
        background-color: #f8f9fa;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .btn {
        border-radius: 6px;
    }

    .search-form {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 15px;
    }

    .search-form input {
        max-width: 250px;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-3">Data Mitra</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="{{ route('mitra.create') }}" class="btn btn-primary me-2">+ Tambah Mitra</a>
            <a href="{{ route('mitra.export-pdf') }}" class="btn btn-danger">Export PDF</a>
        </div>

        <!-- Form Pencarian -->
        <form action="{{ route('mitra.index') }}" method="GET" class="search-form">
            <input type="text" name="search" class="form-control" placeholder="Cari mitra..." value="{{ request('search') }}">
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Toko</th>
                    <th>Jenis Produk</th>
                    <th>Kota</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mitras as $mitra)
                <tr>
                    <td>{{ $mitra->id }}</td>
                    <td>{{ $mitra->nama_toko }}</td>
                    <td>{{ $mitra->jenis_produk }}</td>
                    <td>{{ $mitra->kota }}</td>
                    <td>{{ $mitra->status }}</td>
                    <td>
                        <a href="{{ route('mitra.edit', $mitra->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('mitra.destroy', $mitra->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
