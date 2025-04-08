<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Evento;
use App\Models\Graduado;

class EventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'evento_id' => fake()->word(),
            'nombre_evento' => fake()->word(),
            'ciudad_evento' => fake()->word(),
            'lugar_evento' => fake()->word(),
            'fecha_evento' => fake()->word(),
            'graduado_id' => Graduado::factory(),
        ];
    }
}
