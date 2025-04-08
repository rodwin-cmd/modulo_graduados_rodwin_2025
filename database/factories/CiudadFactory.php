<?php

namespace Database\Factories;

use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->city,
            'departamento_id' => Departamento::inRandomOrder()->first()?->id ?? 1, // Asegúrate de tener departamentos
        ];
    }
}
