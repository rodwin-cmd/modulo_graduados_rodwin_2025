<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ciudad;
use App\Models\Graduados;

class GraduadosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Graduados::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'idgraduado' => fake()->randomNumber(),
            'nombre' => fake()->word(),
            'apellidos' => fake()->word(),
            'tipo_documento' => fake()->word(),
            'numero_documento' => fake()->numberBetween(-10000, 10000),
            'sexo' => fake()->word(),
            'fecha_nacimiento' => fake()->dateTime(),
            'correo_personal' => fake()->word(),
            'correo_institucional' => fake()->word(),
            'telefono' => fake()->numberBetween(-10000, 10000),
            'direccion' => fake()->word(),
            'ciudad_id' => Ciudad::factory(),
        ];
    }
}
