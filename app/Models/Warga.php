<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $guarded = ['id'];


    public function subKriteria()
    {
        return $this->belongsToMany(Sub_kriteria::class)->withTimestamps();
    }

    public function objektif()
    {
        return $this->hasMany(Objektif::class);
    }

    public function verifikasiData()
    {
        return $this->belongsTo(VerifikasiData::class);
    }
}
