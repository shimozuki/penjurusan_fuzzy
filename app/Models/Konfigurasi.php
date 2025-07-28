<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    use HasFactory;
    protected $table = 'konfigurasi';
    protected $fillable = ['nama_aplikasi', 'keterangan', 'gambar_konfigurasi', 'created_by', 'facebook', 'instagram', 'youtube', 'email', 'alamat', 'no_hp'];
}
