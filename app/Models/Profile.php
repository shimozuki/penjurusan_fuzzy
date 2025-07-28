<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = ['nama_profile', 'jenis_kelamin', 'no_hp', 'alamat', 'gambar_profile', 'users_id'];
    public function users()
    {
        $this->belongsTo(User::class);
    }
}
