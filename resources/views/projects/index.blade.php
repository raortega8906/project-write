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
                    <a class="border-green-700" href="#">
                        {{ __("Crear nuevo proyecto") }}
                    </a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Tabla de proyectos --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-ms font-medium text-gray-900 uppercase tracking-wider">
                                <th class="py-3">{{ __('Nombre') }}</th>
                                <th class="px-3 py-3">{{ __('Descripción') }}</th>
                                <th class="px-3 py-3">{{ __('Tecnología') }}</th>
                                <th class="px-3 py-3">{{ __('Equipo') }}</th>
                                <th class="px-3 py-3">{{ __('Servidor') }}</th>
                                <th class="px-3 py-3">{{ __('Fecha de inicio') }}</th>
                                <th class="px-3 py-3">{{ __('Usuario') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if (count($projects) == 0)
                                <tr>
                                    <td colspan="4" class="text-center py-4">No hay proyectos registrados</td>
                                </tr>
                            @else
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>{{ $project->technologies }}</td>
                                        <td>{{ $project->team }}</td>
                                        <td>{{ $project->server_config }}</td>
                                        <td>{{ $project->start_date }}</td>
                                        <td>{{ $project->user_id}}</td>
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