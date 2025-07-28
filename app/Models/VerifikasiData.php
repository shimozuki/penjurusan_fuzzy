<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiData extends Model
{
    use HasFactory;
    protected $table = 'verifikasi_data';
    protected $fillable = [
        'tanggal',
        'waktu',
        'judul_verifikasi',
        'status_verifikasi'
    ];

    public function warga()
    {
        return $this->hasMany(Warga::class);
    }
}
