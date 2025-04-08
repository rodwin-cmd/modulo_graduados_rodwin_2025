<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Estudios;
use App\Models\Graduado;

class EstudiosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudios::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nivel_estudios' => fake()->word(),
            'programa' => fake()->word(),
            'institucion' => fake()->word(),
            'pais' => fake()->word(),
            'ciudad' => fake()->word(),
            'fecha_inicio' => fake()->date(),
            'fecha_fin' => fake()->date(),
            'graduado_id' => Graduado::factory(),
        ];
    }
}
