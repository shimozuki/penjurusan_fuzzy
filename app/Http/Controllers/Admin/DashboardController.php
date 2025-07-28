<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Sub_kriteria;
use App\Models\User;
use App\Models\Warga;

class DashboardController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all()->count();
        $subKriteria = Sub_kriteria::all()->count();
        $alternatif = Warga::all()->count();
        $hasil = Hasil::all()->count();
        $user = User::all()->count();

        return view('admin.dashboard.index',[
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'alternatif' => $alternatif,
            'hasil' => $hasil,
            'user' => $user
        ]);
    }
}
