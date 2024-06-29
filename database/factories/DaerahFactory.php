<?php

namespace Database\Factories;

use App\Models\Daerah;
use Illuminate\Database\Eloquent\Factories\Factory;

class DaerahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Daerah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kabupaten' => $this->faker->city,
            'nama_kecamatan' => $this->faker->citySuffix,
            'nama_kelurahan' => $this->faker->citySuffix,
            'nama_desa' => $this->faker->citySuffix,
            'koordinat' => $this->faker->latitude . ', ' . $this->faker->longitude,
        ];
    }
}