<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Graduado;
use App\Models\RedProfesional;

class RedProfesionalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RedProfesional::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'graduado_id' => Graduado::factory(),
            'red_social' => fake()->word(),
            'url_red_social' => fake()->word(),
        ];
    }
}
