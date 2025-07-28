<?php

namespace Database\Seeders;

use App\Models\Konfigurasi;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;
use App\Models\Sub_kriteria;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = Kriteria::factory()->count(5)
            ->has(Sub_kriteria::factory()->count(4))
            ->create();

        $this->call([
            UserSeeder::class,
            WargaSeeder::class,
            PenilaianSeeder::class,
            KonfigurasiSeeder::class,
            LogSeeder::class
        ]);
    }
}
