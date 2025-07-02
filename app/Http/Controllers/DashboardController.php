<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMitra = Mitra::count();
        $mitraAktif = Mitra::where('status', 'Aktif')->count();
        $mitraTidakAktif = Mitra::where('status', 'Tidak Aktif')->count();

        return view('dashboard', compact('totalMitra', 'mitraAktif', 'mitraTidakAktif'));
    }
}
