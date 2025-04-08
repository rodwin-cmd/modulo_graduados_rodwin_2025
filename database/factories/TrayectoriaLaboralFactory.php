<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Graduado;
use App\Models\TrayectoriaLaboral;

class TrayectoriaLaboralFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrayectoriaLaboral::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'graduado_id' => Graduado::factory(),
            'empresa' => fake()->word(),
            'cargo' => fake()->word(),
            'sector' => fake()->word(),
            'ciudad' => fake()->word(),
            'pais' => fake()->word(),
            'area_desempeno' => fake()->word(),
            'fecha_inicio' => fake()->date(),
            'fecha_fin' => fake()->date(),
            'relacion_formacion' => fake()->boolean(),
        ];
    }
}
