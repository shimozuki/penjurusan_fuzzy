<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $fillable = ['tanggal_penilaian', 'users_id', 'cr_penilaian', 'judul_penilaian', 'kuota_penilaian'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function penilaianDetail()
    {
        return $this->hasMany(Penilaian_detail::class);
    }
    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
    public function pengumuman()
    {
        return $this->hasOne(Pengumuman::class);
    }
}
