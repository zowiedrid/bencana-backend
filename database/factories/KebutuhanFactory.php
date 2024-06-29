<?php

namespace Database\Factories;

use App\Models\Kebutuhan;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barang;
use App\Models\Bencana;
use App\Models\User;

class KebutuhanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kebutuhan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis_barang_id' => Barang::factory(),
            'jumlah_dibutuhkan' => $this->faker->numberBetween(1, 100),
            'lokasi_kebutuhan' => $this->faker->city,
            'bencana_id' => Bencana::factory(),
            'user_id' => User::factory(),
        ];
    }
}