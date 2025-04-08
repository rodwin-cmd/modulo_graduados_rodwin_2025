<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EncuestaSeguimiento;
use App\Models\Graduado;

class EncuestaSeguimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EncuestaSeguimiento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'graduado_id' => Graduado::factory(),
            'anio_aplicacion' => fake()->date(),
            'fecha_respuesta' => fake()->date(),
            'tipo_encuesta' => fake()->word(),
            'medio_aplicacion' => fake()->word(),
        ];
    }
}
