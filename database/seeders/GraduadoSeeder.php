<?php


namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Estudio;
use App\Models\Graduado;
use Illuminate\Database\Seeder;

class GraduadoSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate de tener al menos 1 ciudad y 1 departamento creados
        $ciudadId = Ciudad::inRandomOrder()->first()?->id;
        $departamentoId = Departamento::inRandomOrder()->first()?->id;

        if (!$ciudadId || !$departamentoId) {
            $this->command->error('Primero debes tener al menos una ciudad y un departamento en la base de datos.');
            return;
        }

        Graduado::factory()
            ->count(50)
            ->create([
                'ciudad_id' => $ciudadId,
                'departamento_id' => $departamentoId,
            ])
            ->each(function ($graduado) {
                // Cada graduado tendrá entre 1 y 3 estudios
                Estudio::factory()
                    ->count(rand(1, 3))
                    ->create([
                        'graduado_id' => $graduado->id,
                    ]);
            });

        $this->command->info('50 graduados con estudios creados exitosamente.');
    }
}
