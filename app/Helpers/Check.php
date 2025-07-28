<?php

namespace App\Helpers;

use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Log;
use App\Models\Pengumuman;
use App\Models\Penilaian;
use App\Models\Sub_kriteria;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Check
{
    public static function get_konfigurasi()
    {
        $konfigurasi = DB::table('konfigurasi')->first();
        return $konfigurasi;
    }
    public static function get_profile()
    {
        $id = Auth::user()->id;
        $profile = DB::table('users')
            ->join('profile', 'profile.users_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->get()->first();
        return $profile;
    }
    public static function get_sub_kriteria($id_kriteria = null)
    {
        $sub_kriteria = Sub_kriteria::select('*');
        if ($id_kriteria != null) {
            $sub_kriteria->where('kriteria_id', '=', $id_kriteria);
        }
        return $sub_kriteria->get();
    }
    public static function get_kriteria($id_kriteria = null)
    {
        $sub_kriteria = Kriteria::select('*');
        if ($id_kriteria != null) {
            $sub_kriteria->where('id', '=', $id_kriteria);
        }
        return $sub_kriteria->first();
    }
    public static function kodeKriteria()
    {
        $kodeKriteria = DB::table('kriteria')->max('kode_kriteria');
        $urutan = (int) substr($kodeKriteria, 1, 2);
        $urutan++;

        $huruf = "K";
        $kodeKriteria = $huruf . sprintf("%02s", $urutan);
        return $kodeKriteria;
    }
    public static function get_tanggal_insert($tanggal)
    {
        $exp = explode('-', $tanggal);
        $tanggalFix = implode('-', [$exp[2], $exp[1], $exp[0]]);
        return $tanggalFix;
    }
    public static function get_tanggal_show($tanggal)
    {
        $exp = explode('-', $tanggal);
        $tanggalFix = implode('-', [$exp[2], $exp[1], $exp[0]]);
        return $tanggalFix;
    }

    public static function row_penyeleksian_hasil($id_penilaian)
    {
        $hasil = Hasil::where('penilaian_id', '=', $id_penilaian)->get()->count();
        return $hasil > 0 ? true : false;
    }

    public static function get_warga($id_warga)
    {
        $warga = Warga::select('*');
        if ($id_warga != null) {
            $warga->where('id', '=', $id_warga);
        }
        return $warga->first();
    }

    public static function get_users($id_users)
    {
        $profile = DB::table('users')
            ->join('profile', 'profile.users_id', '=', 'users.id')
            ->where('users.id', '=', $id_users)
            ->get()->first();
        return $profile;
    }


    public static function convertFloat($value)
    {
        switch ($value) {
            case '1':
                return 1;
                break;
            case '2':
                return  2;
                break;
            case '3':
                return  3;
                break;
            case '4':
                return  4;
                break;
            case '5':
                return  5;
                break;
            case '6':
                return  6;
                break;
            case '7':
                return  7;
                break;
            case '8':
                return  8;
                break;
            case '9':
                return  9;
                break;
            case '1/2':
                return  1 / 2;
                break;
            case '1/3':
                return 1 / 3;
                break;
            case '1/4':
                return 1 / 4;
                break;
            case '1/5':
                return 1 / 5;
                break;
            case '1/6':
                return 1 / 6;
                break;
            case '1/7':
                return 1 / 7;
                break;
            case '1/8':
                return 1 / 8;
                break;
            case '1/9':
                return 1 / 9;
                break;
            default:
                break;
        }
    }

    public static function numFormat($value)
    {
        return floatval(number_format($value, 3, '.', ','));
    }

    public static function logInsert($mess)
    {
        Log::insert([
            'users_id' => Auth::user()->id,
            'aktivitas' => $mess
        ]);
    }

    public static function get_penilaian_id($id)
    {
        $get = Penilaian::find($id);
        return $get;
    }

    public static function get_hasil($id)
    {
        $get = Hasil::find($id);
        return $get;
    }

    public static function pengumuman_penilaian($penilaian_id)
    {
        $get = Pengumuman::where('penilaian_id', '=', $penilaian_id)->first();
        return $get;
    }
}
