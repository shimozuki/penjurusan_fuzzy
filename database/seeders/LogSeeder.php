<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::insert([
            'users_id' => 1,
            'aktivitas' => 'Login user dengan id',
        ]);
        Log::insert([
            'users_id' => 1,
            'aktivitas' => 'Menambahkan user',
        ]);
        Log::insert([
            'users_id' => 1,
            'aktivitas' => 'Mengedit user',
        ]);
        Log::insert([
            'users_id' => 1,
            'aktivitas' => 'Mendelete user',
        ]);
    }
}
