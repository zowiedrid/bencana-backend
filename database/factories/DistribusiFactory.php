<?php

namespace Database\Factories;

use App\Models\Distribusi;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barang;
use App\Models\Posko;
use App\Models\User;

class DistribusiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Distribusi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggal_distribusi' => $this->faker->date(),
            'jenis_barang_id' => Barang::factory(),
            'jumlah_didistribusikan' => $this->faker->numberBetween(1, 100),
            'lokasi_distribusi' => Posko::factory(),
            'penerima_bantuan' => $this->faker->name,
            'user_id' => User::factory(),
            'keterangan' => $this->faker->sentence,
        ];
    }
}