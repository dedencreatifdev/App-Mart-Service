<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => $this->faker->unique()->bothify('PRD-#####'),
            'nama' => $this->faker->words(3, true),
            'satuan_id' => $this->faker->numberBetween(1, 10),
            'kategori_id' => $this->faker->numberBetween(1, 10),
            'brand_id' => $this->faker->numberBetween(1, 10),
            'harga' => $this->faker->randomFloat(2, 90000, 1000000),
            'hpp' => $this->faker->randomFloat(2, 10000, 90000),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
