<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="inline-flex items-center px-4 py-2 border text-sm text-green-700 leading-5 font-medium rounded-md border-green-700" href="{{ route('projects.create') }}">
                        {{ __("Crear nuevo proyecto") }}
                    </a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Tabla de proyectos --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-ms font-medium text-gray-900 uppercase tracking-wider">
                                <th class="py-3 px-2">{{ __('Nombre') }}</th>
                                <th class="px-3 py-3">{{ __('Descripción') }}</th>
                                <th class="px-3 py-3">{{ __('Tecnología') }}</th>
                                <th class="px-3 py-3">{{ __('Equipo') }}</th>
                                <th class="px-3 py-3">{{ __('Servidor') }}</th>
                                <th class="px-3 py-3">{{ __('Fecha de inicio') }}</th>
                                <th class="px-3 py-3">{{ __('Usuario') }}</th>
                                <th class="px-3 py-3">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($projects->isEmpty())
                                <tr>
                                    <td colspan="7" class="px-2 py-4 text-center">No hay proyectos registrados</td>
                                </tr>
                            @else
                                @foreach ($projects as $project)
                                    <tr>
                                        <td class="px-3 py-2">{{ $project->name }}</td>
                                        <td class="px-3 py-2">{{ $project->description }}</td>
                                        <td class="px-3 py-2">
                                            @if(is_array(json_decode($project->technologies, true)))
                                                {{ implode(', ', json_decode($project->technologies, true)) }}
                                            @else
                                                {{ str_replace('"', '', json_decode($project->technologies, true)) }}
                                            @endif
                                        </td>
                                        <td class="px-3 py-2">
                                            @if(is_array(json_decode($project->team, true)))
                                                {{ implode(', ', json_decode($project->team, true)) }}
                                            @else
                                                {{ str_replace('"', '', json_decode($project->team, true)) }}
                                            @endif
                                        </td>
                                        <td class="px-3 py-2">
                                            @if(is_array(json_decode($project->server_config, true)))
                                                {{ implode(', ', json_decode($project->server_config, true)) }}
                                            @else
                                                {{ str_replace('"', '', json_decode($project->server_config, true)) }}
                                            @endif
                                        </td>
                                        <td class="px-3 py-2">
                                            {{ \Carbon\Carbon::parse($project->start_date)->translatedFormat('d \d\e F \d\e Y') }}
                                        </td>
                                        <td class="px-3 py-2">{{ $project->user_id }}</td>  
                                        <td class="px-3 py-2 wrap-content">
                                            <a href="{{ route('projects.show', $project) }}" class="text-blue-700 hover:text-blue-900">Ver</a>
                                            <a href="{{ route('projects.edit', $project) }}" class="text-green-700 hover:text-green-900">Editar</a>
                                            <a href="#" class="text-red-700 hover:text-red-900">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>