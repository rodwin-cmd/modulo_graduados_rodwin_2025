<?php

namespace Database\Factories;

use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
{
    protected $model = Ciudad::class;

    public function definition(): array
    {
        return [

            'nombre' => $this->faker->city,
            'departamento_id' => Departamento::inRandomOrder()->first()?->id,
        ];
    }
}
