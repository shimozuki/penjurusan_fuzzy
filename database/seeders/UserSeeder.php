<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'username' => 'admin123',
            'password' => Hash::make('admin123'),
            'forgot' => null,
            'level' => 'admin',
            'status' => 'aktif',
        ]);

        Profile::create([
            'nama_profile' => 'Admin Bansos',
            'jenis_kelamin' => 'L',
            'no_hp' => '082389284123',
            'alamat' => 'Medan, Sumut',
            'gambar_profile' => null,
            'users_id' => $user1->id
        ]);

        $user2 = User::create([
            'username' => 'admin124',
            'password' => Hash::make('admin124'),
            'forgot' => null,
            'level' => 'admin',
            'status' => 'aktif',
        ]);

        Profile::create([
            'nama_profile' => 'Admin Bansos 2',
            'jenis_kelamin' => 'L',
            'no_hp' => '0832983523',
            'alamat' => 'Medan, Sumut 2',
            'gambar_profile' => null,
            'users_id' => $user2->id
        ]);
    }
}
