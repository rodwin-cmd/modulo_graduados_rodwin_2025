<?php

namespace App\Filament\Widgets;

use App\Models\Graduado;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Illuminate\Support\Facades\DB;

class GraduadosGeneroChart extends ChartWidget
{
    use InteractsWithPageTable;
    protected static ?string $heading = ' Géneros Graduados UCP';

    protected static ?string $maxHeight ='400px';

    protected function getData(): array
    {
        // Contar graduados por sexo con Eloquent
        $counts = Graduado::select('sexo', DB::raw('count(*) as total'))
            ->groupBy('sexo')
            ->pluck('total','sexo');

        $hombres = $counts['Hombre'] ?? 0;
        $mujeres = $counts['Mujer']  ?? 0;
        $otros   = $counts['Otro']   ?? 0;

        return [
            'labels' => ['Hombre', 'Mujer', 'Otro'],
            'datasets' => [[
                'label'           => 'Graduados',
                'data'            => [$hombres, $mujeres, $otros],
                'backgroundColor' => [
                    '#4e73df', // color segmento Hombre
                    '#1cc88a', // color segmento Mujer
                    '#36b9cc', // color segmento Otro
                ],
                'hoverOffset'     => 4,
            ]],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
