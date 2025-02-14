<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'crm' => rand(111111, 999999),
            'especialidade' => fake()->randomElement(['cardiologia', 'neurologia', 'pediatria', 'cirurgia', 'oncologia']),
        ];
    }
}
