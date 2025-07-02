@extends('layout')

@section('content')

<style>
    .form-card {
        background-color: white;
        border-radius: 12px;
        padding: 30px;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .form-card h4 {
        margin-bottom: 20px;
        font-weight: bold;
    }

    .form-control, .form-select {
        border-radius: 8px;
    }

    .btn-primary {
        border-radius: 8px;
    }
</style>

<div class="container mt-4">
    <div class="form-card">
        <h4>Tambah Mitra</h4>

        <form action="{{ route('mitra.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_toko" class="form-label">Nama Toko</label>
                <input type="text" name="nama_toko" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                <input type="text" name="jenis_produk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" name="kota" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('mitra.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
</div>
@endsection
