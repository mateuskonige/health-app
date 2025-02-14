<?php

namespace Database\Factories;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atendimento>
 */
class AtendimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data_atendimento' => now(),
            'medico_id' => Medico::factory()->create()->id,
            'paciente_id' => Paciente::factory()->create()->id,
        ];
    }
}
