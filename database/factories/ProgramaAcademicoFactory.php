<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramaAcademicoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_programa' => $this->faker->unique()->uuid,
            'programa' => $this->faker->randomElement([
                'Ingeniería de Sistemas',
                'Administración de Empresas',
                'Contaduría Pública',
                'Derecho',
                'Psicología',
                'Ingeniería Civil'
            ]),
            'facultad' => $this->faker->randomElement(['Ingeniería', 'Ciencias Sociales', 'Ciencias Económicas']),
            'nivel' => $this->faker->randomElement(['Pregrado', 'Posgrado']),
            'modalidad' => $this->faker->randomElement(['Presencial', 'Virtual']),
            'codigo_SNIES' => $this->faker->unique()->numberBetween(10000, 99999),
        ];
    }
}
