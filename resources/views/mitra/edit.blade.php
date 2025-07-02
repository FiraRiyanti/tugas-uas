@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Edit Mitra</h2>

        <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Nama Toko</label>
                <input type="text" name="nama_toko" class="form-control" value="{{ $mitra->nama_toko }}" required>
            </div>
            <div class="mb-3">
                <label>Jenis Produk</label>
                <input type="text" name="jenis_produk" class="form-control" value="{{ $mitra->jenis_produk }}" required>
            </div>
            <div class="mb-3">
                <label>Kota</label>
                <input type="text" name="kota" class="form-control" value="{{ $mitra->kota }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Aktif" {{ old('status', $mitra->status ?? '') == 'Aktif' ? 'selected' : '' }}>Aktif
                    </option>
                    <option value="Tidak Aktif" {{ old('status', $mitra->status ?? '') == 'Tidak Aktif' ? 'selected' : '' }}>
                        Tidak Aktif</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('mitra.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection