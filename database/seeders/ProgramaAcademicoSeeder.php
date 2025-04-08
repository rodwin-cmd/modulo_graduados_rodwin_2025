<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramaAcademico;

class ProgramaAcademicoSeeder extends Seeder
{
    public function run(): void
    {
        ProgramaAcademico::create([
            'programa' => 'Ingeniería de Sistemas',
            'facultad' => 'Ingeniería',
            'nivel' => 'Pregrado',
            'modalidad' => 'Presencial',
            'codigo_SNIES' => 123456
        ]);
    }
}
