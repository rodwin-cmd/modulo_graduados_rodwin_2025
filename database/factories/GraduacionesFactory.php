<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Graduaciones;
use App\Models\GraduadosProgramasAcademicos;

class GraduacionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Graduaciones::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_graduaciones' => fake()->randomNumber(),
            'graduado_id' => fake()->randomNumber(),
            'programa_id' => fake()->randomNumber(),
            'fecha_grado' => fake()->dateTime(),
            'promediofinal' => fake()->numberBetween(-10000, 10000),
            'mencion_honorifica' => fake()->word(),
            'graduados_programas_academicos_id' => GraduadosProgramasAcademicos::factory(),
        ];
    }
}
