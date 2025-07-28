<?php

namespace Database\Seeders;

use App\Models\Hasil;
use App\Models\Pengumuman;
use Illuminate\Database\Seeder;
use App\Models\Penilaian;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penilaian = Penilaian::create([
            'judul_penilaian' => 'judul1',
            'tanggal_penilaian' => date('Y-m-d'),
            'users_id' => 1,
        ]);

        // hasil
        Hasil::create([
            'warga_id' => 1,
            'rank_hasil' => 1,
            'bobot_hasil' => 9.58,
            'cr_hasil' => 0.05,
            'penilaian_id' => $penilaian->id
        ]);
        // Pengumuman
        Pengumuman::create([
            'judul_pengumuman' => 'Pengumuman bantuan sosial covid 19',
            'keterangan_pengumuman' => 'Keterangan bantuan sosial',
            'tanggal_pengumuman' => date('Y-m-d'),
            'status_pengumuman' => 'buka',
            'penilaian_id' => $penilaian->id
        ]);
    }
}
