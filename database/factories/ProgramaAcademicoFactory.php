<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProgramaAcademico;

class ProgramaAcademicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProgramaAcademico::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_programa' => fake()->word(),
            'programa' => fake()->word(),
            'facultad' => fake()->word(),
            'nivel' => fake()->word(),
            'modalidad' => fake()->word(),
            'codigo_SNIES' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
