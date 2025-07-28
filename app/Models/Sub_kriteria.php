<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_kriteria extends Model
{
    use HasFactory;
    protected $table = 'sub_kriteria';
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    public function warga()
    {
        return $this->belongsToMany(Warga::class);
    }
}
