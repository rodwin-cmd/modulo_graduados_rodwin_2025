<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    public function run(): void
    {
        Ciudad::create([
            'nombre' => 'Pereira',
            'departamento_id' => 1
        ]);
    }
}
