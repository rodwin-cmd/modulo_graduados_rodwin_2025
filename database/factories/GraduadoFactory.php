<?php

namespace Database\Factories;

use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class GraduadoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_documento' => $this->faker->unique()->numerify('##########'),
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'tipo_documento' => $this->faker->randomElement(['RC', 'TI', 'CC', 'TE', 'PP', 'PEP']),
            'sexo' => $this->faker->randomElement(['Hombre', 'Mujer']),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '-20 years'), // mayores de edad
            'correo_personal' => $this->faker->unique()->safeEmail,
            'correo_institucional' => $this->faker->unique()->companyEmail,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'ciudad_id' => Ciudad::inRandomOrder()->first()?->id ?? 1,
            'departamento_id' => Departamento::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
