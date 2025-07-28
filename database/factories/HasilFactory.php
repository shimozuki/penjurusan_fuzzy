<?php

namespace Database\Factories;

use App\Models\Hasil;
use App\Models\Penilaian;
use Illuminate\Database\Eloquent\Factories\Factory;

class HasilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hasil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'warga_id' => 1,
            'rank_hasil' => 1,
            'bobot_hasil' => $this->faker->numberBetween(1,5),
            'penilaian_id' => Penilaian::factory()
        ];
    }
}
