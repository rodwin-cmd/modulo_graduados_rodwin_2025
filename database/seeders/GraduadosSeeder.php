<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Graduado;

class GraduadosSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $i) {
            Graduado::create([
                'nombre' => $faker->firstName,
                'apellidos' => $faker->lastName,
                'tipo_documento' => $faker->randomElement(['CC', 'TI', 'CE']),
                'numero_documento' => $faker->unique()->numberBetween(10000000, 99999999),
                'sexo' => $faker->randomElement(['M', 'F']),
                'fecha_nacimiento' => $faker->date(),
                'correo_personal' => $faker->email,
                'correo_institucional' => $faker->companyEmail,
                'telefono' => $faker->numerify('3#########'),
                'direccion' => $faker->address,
                'ciudad_id' => 1,
            ]);
        }
    }
}
