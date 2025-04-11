<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Departamento;
use App\Models\Ciudad;

class ImportColombiaData extends Command
{
    protected $signature = 'import:colombia';
    protected $description = 'Importar departamentos y ciudades de Colombia desde un archivo JSON';

    public function handle()
    {
        // Cargar el archivo JSON desde storage/app/colombia.json
        $json = Storage::get('colombia.json');
        $data = json_decode($json, true);

        // Verificar si el JSON se cargó correctamente
        if (!$data) {
            $this->error('No se pudo leer o decodificar el archivo JSON.');
            return;
        }

        // Recorrer los departamentos
        foreach ($data as $departamentoData) {
            $departamento = Departamento::firstOrCreate([
                'nombre' => $departamentoData['departamento']
            ]);

            // Recorrer las ciudades de cada departamento
            foreach ($departamentoData['ciudades'] as $ciudadNombre) {
                Ciudad::firstOrCreate([
                    'nombre' => $ciudadNombre,
                    'departamento_id' => $departamento->id
                ]);
            }
        }

        $this->info('Departamentos y ciudades importados correctamente.');
    }
}
