<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDetail extends Model
{
    use HasFactory;
    protected $table = 'hasil_detail';
    protected $fillable = [
        'warga_id',
        'rank_hasil',
        'bobot_hasil',
        'status',
        'hasil_id',
    ];

    public function hasil()
    {
        return $this->belongsTo(Hasil::class);
    }
}
