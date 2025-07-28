<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $fillable = ['judul_pengumuman', 'keterangan_pengumuman', 'tanggal_pengumuman', 'status_pengumuman', 'penilaian_id','kuota_pengumuman'];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}
