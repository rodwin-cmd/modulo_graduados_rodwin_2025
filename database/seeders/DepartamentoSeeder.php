<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        Departamento::create([
            'nombre' => 'Risaralda',
            'pais_id' => 1
        ]);
    }
}
