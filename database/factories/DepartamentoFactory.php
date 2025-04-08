<?php

namespace Database\Factories;

use App\Models\Pais;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartamentoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->uuid,
            'nombre' => $this->faker->state,
        ];
    }
}
