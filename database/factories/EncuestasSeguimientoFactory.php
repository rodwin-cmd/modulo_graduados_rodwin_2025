<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EncuestasSeguimiento;
use App\Models\Graduados;

class EncuestasSeguimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EncuestasSeguimiento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_encuestas' => fake()->randomNumber(),
            'graduado_id' => fake()->randomNumber(),
            'anio_aplicacion' => fake()->dateTime(),
            'fecha_respuesta' => fake()->dateTime(),
            'tipo_encuesta' => fake()->word(),
            'medio_aplicacion' => fake()->word(),
            'graduados_id' => Graduados::factory(),
        ];
    }
}
