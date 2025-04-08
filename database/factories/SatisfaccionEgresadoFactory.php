<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EncuestasSeguimientoGraduados;
use App\Models\SatisfaccionEgresado;

class SatisfaccionEgresadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SatisfaccionEgresado::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_satisfaccion' => fake()->randomNumber(),
            'encuesta_id' => fake()->randomNumber(),
            'satisfacion_formacion_acad' => fake()->word(),
            'recomendacion_programa' => fake()->boolean(),
            'comentarios_adicionales' => fake()->word(),
            'encuestas_seguimiento_graduados_id' => EncuestasSeguimientoGraduados::factory(),
        ];
    }
}
