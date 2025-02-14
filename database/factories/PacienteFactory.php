<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
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
            'cpf' => rand(111_111_111_11, 999_999_999_99),
            'data_nascimento' => fake()->date('1998-12-12', '2020-12-12'),
            'email' => fake()->email(),
        ];
    }
}
