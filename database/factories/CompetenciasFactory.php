<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Competencias;
use App\Models\EncuestasSeguimiento;

class CompetenciasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Competencias::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_competencias' => fake()->randomNumber(),
            'encuesta_id' => fake()->randomNumber(),
            'nivel_competencias' => fake()->word(),
            'encuestas_seguimiento_id' => EncuestasSeguimiento::factory(),
        ];
    }
}
