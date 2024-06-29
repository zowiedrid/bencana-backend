<?php

namespace Database\Factories;

use App\Models\Posko;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Daerah;

class PoskoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posko::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_posko' => $this->faker->company,
            'alamat' => $this->faker->address,
            'kontak_penanggung_jawab' => $this->faker->phoneNumber,
            'daerah_id' => Daerah::factory(),
        ];
    }
}