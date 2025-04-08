<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EventoGraduado;
use App\Models\EventosContactoGraduados;

class EventoGraduadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventoGraduado::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'evento_id' => fake()->randomNumber(),
            'graduado_id' => fake()->randomNumber(),
            'eventos_contacto_graduados_id' => EventosContactoGraduados::factory(),
        ];
    }
}
