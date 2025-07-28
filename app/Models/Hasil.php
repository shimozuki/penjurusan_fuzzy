<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $fillable = ['penilaian_id', 'cr_hasil'];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }

    public function hasilDetail()
    {
        return $this->hasMany(HasilDetail::class);
    }
}
