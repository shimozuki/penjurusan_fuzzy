<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\Pengumuman;
use App\Models\Penilaian;
use App\Models\Warga;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengumuman = Pengumuman::where('status_pengumuman', '=', 'buka')->get();
        return view('user.home.index', [
            'pengumuman' => $pengumuman
        ]);
    }
    public function lihat($id)
    {
        $pengumuman = Pengumuman::where('status_pengumuman', '=', 'buka')
            ->where('id', '=', $id)
            ->first();
        return view('user.cari.index', [
            'pengumuman' => $pengumuman
        ]);
    }
    public function reloadCaptcha($id)
    {
        return response()->json(['captcha' => captcha_img()]);
    }
    public function search(Request $request, $id)
    {
        $validated = $request->validate([
            'captcha' => 'required|captcha',
            'nama_warga' => 'required',
        ]);

        // pengumuman
        $pengumuman = Pengumuman::join('penilaian', 'pengumuman.penilaian_id', '=', 'penilaian.id')
            ->where('pengumuman.id', '=', $id)
            ->first();

        // hasil
        $hasil = Hasil::join('hasil_detail', 'hasil_detail.hasil_id', '=', 'hasil.id')
            ->select('*', 'hasil_detail.id as hasil_detail_id')
            ->join('warga', 'warga.id', '=', 'hasil_detail.warga_id')
            ->where('hasil.penilaian_id', '=', $pengumuman->penilaian_id)
            ->where('warga.nama_warga', '=', $request->input('nama_warga'))
            ->first();

        if ($hasil == null) {
            return redirect()->route('user.gagal', $id);
        } else {
            return redirect()->route('user.hasil', $hasil->hasil_detail_id);
        }
    }

    public function gagal($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('user.hasil.gagal', [
            'pengumuman' => $pengumuman
        ]);
    }
    public function hasil($id)
    {
        $hasilDetail = HasilDetail::find($id);

        return view('user.hasil.index', [
            'hasil_detail' => $hasilDetail
        ]);
    }
}
