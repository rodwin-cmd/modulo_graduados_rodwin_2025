<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Departamento;
use App\Models\Pai;

class DepartamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Departamento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_departamento' => fake()->word(),
            'nombre' => fake()->word(),
            'pais_id' => Pai::factory(),
        ];
    }
}
