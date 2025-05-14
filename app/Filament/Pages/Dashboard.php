<?php

namespace App\Filament\Pages;

use App\Models\Facultad;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;


    public function filtersForm(Form $form):Form
    {
        return $form->schema([
            Section::make('Filtros')
                ->schema([
                    Select::make('facultad_id')
                        ->label('Facultad')
                        ->options(Facultad::all()->pluck('nombre', 'id'))
                        ->reactive()
                        ->afterStateUpdated(function (callable $set, $state) {
                            $programas = \App\Models\ProgramaAcademico::where('facultad_id', $state)->pluck('programa', 'id')->toArray();
                            $set('programa_id', null); // limpia el campo anterior
                            $set('programaOptions', $programas); // crea un estado temporal para las opciones
                        }),

                    Select::make('programa_academico_id')
                        ->label('Programa Académico')
                        ->options(function (callable $get) {
                            $facultadId = $get('facultad_id');
                            if (!$facultadId) return [];
                            return \App\Models\ProgramaAcademico::where('facultad_id', $facultadId)
                                ->pluck('programa', 'id');
                        })
                        ->reactive()
                ])
                ->columns(2),
        ]);
    }
}
