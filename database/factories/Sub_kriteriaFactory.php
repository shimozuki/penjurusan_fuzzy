<?php

namespace Database\Factories;

use App\Models\Kriteria;
use App\Models\Sub_kriteria;
use Illuminate\Database\Eloquent\Factories\Factory;

class Sub_kriteriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sub_kriteria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_sub_kriteria' => $this->faker->countryCode(),
            'nama_sub_kriteria' => $this->faker->name(),
            'bobot_sub_kriteria' => '3',
            'keterangan_sub_kriteria' => $this->faker->text(),
            'kriteria_id' => Kriteria::factory()
        ];
    }
}
