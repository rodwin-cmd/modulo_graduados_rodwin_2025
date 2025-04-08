<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EncuestaSeguimientoGraduado;
use App\Models\Encuestum;
use App\Models\Graduado;
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
            'encuesta_id' => Encuestum::factory(),
            'graduado_id' => Graduado::factory(),
            'satisfacion_formacion_acad' => fake()->word(),
            'recomendacion_programa' => fake()->boolean(),
            'comentarios_adicionales' => fake()->word(),
            'encuesta_seguimiento_graduado_id' => EncuestaSeguimientoGraduado::factory(),
        ];
    }
}
