<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktual extends Model
{
    use HasFactory;
    protected $table = 'aktual';
    protected $guarded = ['id'];
}
