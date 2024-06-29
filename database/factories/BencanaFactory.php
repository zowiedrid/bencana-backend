<?php

namespace Database\Factories;

use App\Models\Bencana;
use Illuminate\Database\Eloquent\Factories\Factory;

class BencanaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bencana::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_bencana' => $this->faker->word,
            'tanggal_kejadian' => $this->faker->date(),
            'waktu_kejadian' => $this->faker->time(),
            'lokasi_kejadian' => $this->faker->city,
            'tingkat_keparahan_bencana' => $this->faker->randomElement(['Ringan', 'Sedang', 'Berat']),
            'jumlah_korban' => $this->faker->numberBetween(0, 1000),
            'jumlah_pengungsi' => $this->faker->numberBetween(0, 1000),
            'kerugian_materi' => $this->faker->randomNumber(),
            'deskripsi' => $this->faker->paragraph,
        ];
    }
}