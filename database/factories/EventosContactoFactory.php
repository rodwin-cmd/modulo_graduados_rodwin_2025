<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EventosContacto;

class EventosContactoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventosContacto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_eventos' => fake()->randomNumber(),
            'tipo_evento' => fake()->word(),
            'fecha_evento' => fake()->dateTime(),
        ];
    }
}
