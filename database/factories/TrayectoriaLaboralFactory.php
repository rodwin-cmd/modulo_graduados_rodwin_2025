<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Graduados;
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
            'id_trayectoria' => fake()->randomNumber(),
            'graduado_id' => fake()->randomNumber(),
            'empresa' => fake()->word(),
            'cargo' => fake()->word(),
            'sector' => fake()->word(),
            'ciudad' => fake()->word(),
            'pais' => fake()->word(),
            'area_desempeno' => fake()->word(),
            'fecha_inicio' => fake()->dateTime(),
            'fecha_fin' => fake()->dateTime(),
            'relacion_formacion' => fake()->boolean(),
            'graduados_id' => Graduados::factory(),
        ];
    }
}
