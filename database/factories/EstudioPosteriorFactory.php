<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EstudioPosterior;
use App\Models\Graduado;

class EstudioPosteriorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstudioPosterior::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'graduado_id' => Graduado::factory(),
            'nivel_estudios' => fake()->word(),
            'programa' => fake()->word(),
            'institucion' => fake()->word(),
            'pais' => fake()->word(),
            'ciudad' => fake()->word(),
            'fecha_inicio' => fake()->date(),
            'fecha_fin' => fake()->date(),
        ];
    }
}
