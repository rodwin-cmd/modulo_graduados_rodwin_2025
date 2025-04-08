<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Competencia;
use App\Models\EncuestaSeguimiento;
use App\Models\Encuestum;

class CompetenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Competencia::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'encuesta_id' => Encuestum::factory(),
            'nivel_competencias' => fake()->word(),
            'encuesta_seguimiento_id' => EncuestaSeguimiento::factory(),
        ];
    }
}
