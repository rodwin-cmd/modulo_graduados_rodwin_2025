<?php

namespace Database\Factories;

use App\Models\Ciudad;
use App\Models\ProgramaAcademico;
use Illuminate\Database\Eloquent\Factories\Factory;

class GraduadoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'tipo_documento' => $this->faker->randomElement(['CC', 'TI', 'CE']),
            'numero_documento' => $this->faker->unique()->numerify('##########'),
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'fecha_nacimiento' => $this->faker->date(),
            'correo_personal' => $this->faker->unique()->safeEmail,
            'correo_institucional' => $this->faker->unique()->companyEmail,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'ciudad_id' => Ciudad::inRandomOrder()->first()?->id,
            'programa_academico_id' => ProgramaAcademico::inRandomOrder()->first()?->id,
        ];
    }
}
