<?php

namespace Database\Seeders;

use App\Models\Atendimento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atendimento::factory(20)->create();
    }
}
