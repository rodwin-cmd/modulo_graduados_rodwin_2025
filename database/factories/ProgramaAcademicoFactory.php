<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramaAcademicoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'programa' => $this->faker->words(3, true),
            'facultad' => $this->faker->randomElement(['Ingeniería', 'Ciencias Sociales', 'Salud', 'Educación']),
            'nivel' => $this->faker->randomElement(['Pregrado', 'Especialización', 'Maestría']),
            'modalidad' => $this->faker->randomElement(['Presencial', 'Virtual', 'Distancia']),
            'codigo_SNIES' => $this->faker->unique()->numberBetween(10000, 99999),
        ];
    }
}
