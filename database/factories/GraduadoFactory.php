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
            'numero_documento' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino', 'Otro']),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '-20 years'),
            'correo_personal' => $this->faker->unique()->safeEmail,
            'correo_institucional' => $this->faker->unique()->companyEmail,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'ciudad_id' => Ciudad::inRandomOrder()->first()?->id ?? 1, // Asegúrate que haya ciudades primero
            'programa_academico_id' => ProgramaAcademico::inRandomOrder()->first()?->id ?? 1, // Igual para programas
        ];
    }
}
