<?php

namespace Database\Factories;

use App\Models\Graduado;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudioFactory extends Factory
{
    public function definition(): array
    {
        $fechaInicio = $this->faker->dateTimeBetween('-10 years', '-5 years');
        $fechaFin = $this->faker->dateTimeBetween($fechaInicio, 'now');

        return [
            'nivel_estudios' => $this->faker->randomElement([
                'Curso',
                'Diplomado',
                'Técnico',
                'Tecnología',
                'Pregrado',
                'Especialización',
                'Maestría',
                'Doctorado',
            ]),
            'programa_id' => $this->faker->words(3, true),
            'institucion' => $this->faker->company . ' Universidad',
            'fecha_inicio' => $fechaInicio->format('Y-m-d'),
            'fecha_fin' => $fechaFin->format('Y-m-d'),
            'graduado_id' => Graduado::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
