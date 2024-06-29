<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_barang' => $this->faker->word,
            'deskripsi' => $this->faker->paragraph,
            'satuan' => $this->faker->word,
            'gambar' => $this->faker->imageUrl(), // Generate a random image URL
            'keterangan' => $this->faker->paragraph,
        ];
    }
}
