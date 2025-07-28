<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Konfigurasi;

class KonfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Konfigurasi::create([
            'nama_aplikasi' => 'Aplikasi Bansos',
            'keterangan' => 'sistem pendukung keputusan penerima bansos fuzzy ahp',
            'gambar_konfigurasi' => null,
            'created_by' => 'Bima Ega',
            'facebook' => 'https://www.facebook.com/bimaega15',
            'instagram' => 'https://www.instagram.com/bimaega/',
            'youtube' => 'https://www.youtube.com/channel/UCBWfqsZQ85gIWevF9guEEyg',
            'email' => 'bimaega15@gmail.com',
            'alamat' => 'Medan, sumut',
            'no_hp' => '082277506232'
        ]);
    }
}
