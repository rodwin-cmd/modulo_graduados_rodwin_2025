<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Graduacion;
use App\Models\Graduado;
use App\Models\GraduadoProgramaAcademico;
use App\Models\Programa;

class GraduacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Graduacion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'graduado_id' => Graduado::factory(),
            'programa_id' => Programa::factory(),
            'fecha_grado' => fake()->date(),
            'promediofinal' => fake()->numberBetween(-10000, 10000),
            'mencion_honorifica' => fake()->word(),
            'graduado_programa_academico_id' => GraduadoProgramaAcademico::factory(),
        ];
    }
}
