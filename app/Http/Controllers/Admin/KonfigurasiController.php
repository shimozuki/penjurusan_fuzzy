<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;
use File;

class KonfigurasiController extends Controller
{
    public function index()
    {
        $konfigurasi = Konfigurasi::first();
        return view('admin.konfigurasi.index', [
            'konfigurasi' => $konfigurasi
        ]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_aplikasi' => 'required',
            'created_by' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $file = $request->file('gambar_konfigurasi');
        $gambar_konfigurasi = $this->uploadFile($file, $id);
        $update = Konfigurasi::where('id', '=', $id)
            ->update([
                'nama_aplikasi' => $request->input('nama_aplikasi'),
                'keterangan' => $request->input('keterangan'),
                'gambar_konfigurasi' => $gambar_konfigurasi,
                'created_by' => $request->input('created_by'),
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'youtube' => $request->input('youtube'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'no_hp' => $request->input('no_hp'),
            ]);

        if ($update) {
            Check::logInsert('Berhasil mengubah konfigurasi');
            $request->session()->flash('success', 'Berhasil mengubah data konfigurasi');
        } else {
            $request->session()->flash('error', 'Gagal mengubah data konfigurasi');
        }
        return redirect()->route('admin.konfigurasi.index');
    }
    private function uploadFile($file, $id)
    {
        // delete file
        $this->deleteFile($id);


        if ($file != null) {
            // nama file
            $fileExp =  explode('.', $file->getClientOriginalName());
            $name = $fileExp[0];
            $ext = $fileExp[1];
            $name = time() . '-' . str_replace(' ', '-', $name) . '.' . $ext;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'img/logo/';

            // upload file
            $file->move($tujuan_upload, $name);
        } else {
            $name = null;
        }

        return $name;
    }
    private function deleteFile($id = null)
    {
        if ($id != null) {
            $konfigurasi = Konfigurasi::where('id', '=', $id)->first();
            $gambar = public_path() . '/img/logo/' . $konfigurasi->gambar_konfigurasi;
            if (file_exists($gambar)) {
                if ($konfigurasi->gambar_konfigurasi != 'default.png') {
                    File::delete($gambar);
                }
            }
        }
    }
}
