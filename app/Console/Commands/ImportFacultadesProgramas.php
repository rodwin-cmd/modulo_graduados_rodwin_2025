<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Facultad;
use App\Models\ProgramaAcademico;

class ImportFacultadesProgramas extends Command
{
    protected $signature = 'import:facultades-programas';
    protected $description = 'Importar facultades y programas desde archivo JSON';

    public function handle()
    {
        $json = Storage::get('facultadesUcp.json');
        $data = json_decode($json, true);

        if (!$data) {
            $this->error('No se pudo leer o decodificar el archivo JSON.');
            return;
        }

        foreach ($data as $facultadData) {
            $facultad = Facultad::firstOrCreate([
                'nombre' => $facultadData['nombre']
            ]);

            foreach ($facultadData['programas'] as $programa) {
                ProgramaAcademico::firstOrCreate([
                    'programa' => $programa['nombre'],
                    'nivel' => $programa['nivel'],
                    'modalidad' => $programa['modalidad'],
                    'codigo_SNIES' => $programa['codigo_SNIES'] ?? null,
                    'facultad_id' => $facultad->id
                ]);
            }
        }

        $this->info('Facultades y programas importados correctamente.');
    }
}
