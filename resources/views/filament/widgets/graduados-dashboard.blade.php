@php
    use App\Models\Facultad;
    use App\Models\ProgramaAcademico;
    use App\Models\Graduado;
@endphp

<x-filament::widget>
    <x-filament::card>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            {{-- Gráfico: Graduados por Facultad --}}
            <x-filament::section>
                <x-slot name="heading">Graduados por Facultad</x-slot>
                <x-filament::chart
                    :data="Facultad::withCount('graduados')->get()->map(fn ($facultad) => [
                        'label' => $facultad->nombre,
                        'value' => $facultad->graduados_count,
                    ])->toArray()"
                    type="bar"
                />
            </x-filament::section>

            {{-- Gráfico: Graduados por Programa --}}
            <x-filament::section>
                <x-slot name="heading">Graduados por Programa</x-slot>
                <x-filament::chart
                    :data="ProgramaAcademico::withCount('graduados')->get()->map(fn ($programa) => [
                        'label' => $programa->programa,
                        'value' => $programa->graduados_count,
                    ])->toArray()"
                    type="bar"
                />
            </x-filament::section>

            {{-- Estadísticas Clave --}}
            <x-filament::section>
                <x-slot name="heading">Resumen General</x-slot>
                <div class="space-y-2">
                    <x-filament::stats::stat
                        label="Graduados con empleo"
                        :value="Graduado::where('tiene_empleo', true)->count()"
                    />
                    <x-filament::stats::stat
                        label="Graduados con reconocimientos"
                        :value="Graduado::whereHas('reconocimientos')->count()"
                    />
                    <x-filament::stats::stat
                        label="Graduados en su perfil profesional"
                        :value="Graduado::whereHas('trayectoriasLaborales', fn($q) => $q->where('relacion_formacion', true))->count()"
                    />
                </div>
            </x-filament::section>
        </div>

        {{-- Tabla: Últimos graduados registrados --}}
        <x-filament::section class="mt-8">
            <x-slot name="heading">Últimos Graduados Registrados</x-slot>
            <table class="w-full text-sm text-left">
                <thead>
                <tr>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Programa</th>
                    <th class="px-4 py-2">Correo</th>
                    <th class="px-4 py-2">Fecha Registro</th>
                </tr>
                </thead>
                <tbody>
                @foreach (Graduado::latest()->take(5)->get() as $graduado)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $graduado->nombre }} {{ $graduado->apellidos }}</td>
                        <td class="px-4 py-2">{{ $graduado->programaAcademico->programa ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $graduado->correo_personal }}</td>
                        <td class="px-4 py-2">{{ $graduado->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-filament::section>
    </x-filament::card>
</x-filament::widget>
