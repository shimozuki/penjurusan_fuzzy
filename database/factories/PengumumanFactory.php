<?php

namespace Database\Factories;

use App\Models\Pengumuman;
use App\Models\Penilaian;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengumumanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengumuman::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul_pengumuman' => 'Pengumuman bansos',
            'keterangan_pengumuman' => $this->faker->text(),
            'tanggal_pengumuman' => $this->faker->date(),
            'status_pengumuman' => 'buka',
            'penilaian_id' => Penilaian::factory()
        ];
    }
}
