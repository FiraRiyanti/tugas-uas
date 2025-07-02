<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MitraController extends Controller
{
    // Tampilkan semua data mitra
    public function index(Request $request)
    {
        $query = Mitra::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_toko', 'like', "%$search%")
                ->orWhere('jenis_produk', 'like', "%$search%")
                ->orWhere('kota', 'like', "%$search%");
        }

        $mitras = $query->get();
        return view('mitra.index', compact('mitras'));
    }


    // Tampilkan form tambah data
    public function create()
    {
        return view('mitra.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'jenis_produk' => 'required',
            'kota' => 'required',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        Mitra::create($request->all());
        return redirect()->route('mitra.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('mitra.edit', compact('mitra'));
    }

    // Simpan data edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_toko' => 'required',
            'jenis_produk' => 'required',
            'kota' => 'required',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $mitra = Mitra::findOrFail($id);
        $mitra->update($request->all());
        return redirect()->route('mitra.index')->with('success', 'Data berhasil diubah!');
    }

    // Hapus data
    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();
        return redirect()->route('mitra.index')->with('success', 'Data berhasil dihapus!');
    }

    public function exportPDF()
    {
        $mitras = Mitra::all();
        $pdf = Pdf::loadView('mitra.pdf', compact('mitras'));
        return $pdf->download('laporan-mitra.pdf');
    }
}
