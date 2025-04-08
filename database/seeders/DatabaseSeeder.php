<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Departamento::factory(20)->create();
        \App\Models\Ciudad::factory(20)->create();
        \App\Models\ProgramaAcademico::factory(20)->create();
        \App\Models\Graduado::factory(100)->create();

    }
}
