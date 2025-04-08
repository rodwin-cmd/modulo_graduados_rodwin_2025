<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Encuesta;
use App\Models\Graduado;

class EncuestaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Encuesta::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_encuesta' => fake()->word(),
            'nombre' => fake()->word(),
            'fecha_aplicacion' => fake()->date(),
            'fecha_respuesta' => fake()->date(),
            'tipo_encuesta' => fake()->word(),
            'medio_aplicacion' => fake()->word(),
            'graduado_id' => Graduado::factory(),
        ];
    }
}
