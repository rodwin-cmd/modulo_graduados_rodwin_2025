<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ciudad;
use App\Models\Graduado;

class GraduadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Graduado::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'apellidos' => fake()->word(),
            'tipo_documento' => fake()->word(),
            'numero_documento' => fake()->randomNumber(),
            'sexo' => fake()->word(),
            'fecha_nacimiento' => fake()->date(),
            'correo_personal' => fake()->word(),
            'correo_institucional' => fake()->word(),
            'telefono' => fake()->word(),
            'direccion' => fake()->word(),
            'ciudad_id' => Ciudad::factory(),
        ];
    }
}
