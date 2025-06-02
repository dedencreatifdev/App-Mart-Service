<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Satuan>
 */
class SatuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode'=> $this->faker->unique()->bothify('KST-#####'),
            'nama' => $this->faker->randomElement(['Pcs', 'Pc', 'Set', 'Buah', 'Kg', 'Lembar', 'Box', 'Dus', 'Karung', 'Pack', 'Batang', 'Meter', 'Liter', 'Gelas', 'Karton', 'Sachet', 'Botol', 'Kaleng', 'Gulung', 'Paket']),
        ];
    }
}
