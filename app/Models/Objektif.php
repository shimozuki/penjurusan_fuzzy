<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objektif extends Model
{
    use HasFactory;
    protected $table = 'objektif';
    protected $guarded = ['id'];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
