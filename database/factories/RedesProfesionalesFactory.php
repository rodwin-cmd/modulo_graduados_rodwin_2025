<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Graduados;
use App\Models\RedesProfesionales;

class RedesProfesionalesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RedesProfesionales::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_redesp' => fake()->randomNumber(),
            'graduado_id' => fake()->randomNumber(),
            'red_social' => fake()->word(),
            'url_red_social' => fake()->word(),
            'graduados_id' => Graduados::factory(),
        ];
    }
}
