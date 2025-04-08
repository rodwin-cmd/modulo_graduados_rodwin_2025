<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EstudiosPosteriores;
use App\Models\Graduados;

class EstudiosPosterioresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstudiosPosteriores::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_estudios_post' => fake()->randomNumber(),
            'graduado_id' => fake()->randomNumber(),
            'nivel_estudios' => fake()->word(),
            'programa' => fake()->word(),
            'institucion' => fake()->word(),
            'pais' => fake()->word(),
            'ciudad' => fake()->word(),
            'fecha_inicio' => fake()->dateTime(),
            'fecha_fin' => fake()->dateTime(),
            'graduados_id' => Graduados::factory(),
        ];
    }
}
