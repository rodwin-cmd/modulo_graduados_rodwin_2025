<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\Ciudad;

class ColombiaSeeder extends Seeder
{
    public function run(): void
    {
        $colombia = [
            'Amazonas' => ['Leticia', 'Puerto Nariño'],
            'Antioquia' => ['Medellín', 'Bello', 'Itagüí', 'Envigado', 'Rionegro'],
            'Arauca' => ['Arauca', 'Arauquita', 'Saravena'],
            'Atlántico' => ['Barranquilla', 'Soledad', 'Malambo'],
            'Bolívar' => ['Cartagena', 'Magangué', 'Turbaco'],
            'Boyacá' => ['Tunja', 'Duitama', 'Sogamoso'],
            'Caldas' => ['Manizales', 'Villamaría', 'Chinchiná'],
            'Caquetá' => ['Florencia', 'Morelia'],
            'Casanare' => ['Yopal', 'Aguazul'],
            'Cauca' => ['Popayán', 'Santander de Quilichao'],
            'Cesar' => ['Valledupar', 'Aguachica'],
            'Chocó' => ['Quibdó', 'Istmina'],
            'Córdoba' => ['Montería', 'Lorica'],
            'Cundinamarca' => ['Bogotá D.C.', 'Soacha', 'Fusagasugá', 'Girardot', 'Zipaquirá'],
            'Guainía' => ['Inírida'],
            'Guaviare' => ['San José del Guaviare'],
            'Huila' => ['Neiva', 'Pitalito'],
            'La Guajira' => ['Riohacha', 'Maicao'],
            'Magdalena' => ['Santa Marta', 'Ciénaga'],
            'Meta' => ['Villavicencio', 'Acacías'],
            'Nariño' => ['Pasto', 'Ipiales', 'Tumaco'],
            'Norte de Santander' => ['Cúcuta', 'Ocaña'],
            'Putumayo' => ['Mocoa', 'Puerto Asís'],
            'Quindío' => ['Armenia', 'Montenegro', 'Circasia'],
            'Risaralda' => ['Pereira', 'Dosquebradas', 'Santa Rosa de Cabal'],
            'San Andrés y Providencia' => ['San Andrés'],
            'Santander' => ['Bucaramanga', 'Floridablanca', 'Girón'],
            'Sucre' => ['Sincelejo'],
            'Tolima' => ['Ibagué', 'Espinal'],
            'Valle del Cauca' => ['Cali', 'Palmira', 'Buenaventura', 'Tuluá'],
            'Vaupés' => ['Mitú'],
            'Vichada' => ['Puerto Carreño'],
        ];
        foreach ($colombia as $departamento => $ciudades) {
            $dep = Departamento::create(['nombre' => $departamento]);

            foreach ($ciudades as $ciudad) {
                Ciudad::create([
                    'nombre' => $ciudad,
                    'departamento_id' => $dep->id,
                ]);
            }
        }
    }
}
