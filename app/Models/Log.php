<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'log';
    protected $fillable = ['users_id', 'aktivitas'];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
