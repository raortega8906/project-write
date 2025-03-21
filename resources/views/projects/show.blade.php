<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-300">
                
                {{-- Encabezado del documento --}}
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $project->name }}</h1>
                    <p class="text-gray-600">Fecha de inicio: 
                        {{ \Carbon\Carbon::parse($project->start_date)->translatedFormat('d \d\e F \d\e Y') }}
                    </p>
                </div>

                {{-- Contenido del documento --}}
                <div class="border-t border-gray-300 pt-4">
                    <h3 class="text-lg font-semibold text-gray-700">Descripción</h3>
                    <p class="text-gray-800">{{ $project->description }}</p>
                </div>

                <div class="border-t border-gray-300 pt-4">
                    <h3 class="text-lg font-semibold text-gray-700">Tecnologías utilizadas</h3>
                    <ul class="list-disc list-inside text-gray-800">
                        @foreach(json_decode($project->technologies, true) as $tech)
                            <li>{{ $tech }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="border-t border-gray-300 pt-4">
                    <h3 class="text-lg font-semibold text-gray-700">Equipo</h3>
                    <p class="text-gray-800">{{ str_replace('"', '', $project->team) }}</p>
                </div>

                <div class="border-t border-gray-300 pt-4">
                    <h3 class="text-lg font-semibold text-gray-700">Configuración del Servidor</h3>
                    <p class="text-gray-800">{{ $project->server_config }}</p>
                </div>

                {{-- Botón de regreso --}}
                <div class="mt-6 text-center">
                    <a href="{{ route('projects.index') }}" class="px-4 py-2 text-blue-600 rounded-lg border border-blue-600 hover:text-white hover:bg-blue-600">
                        Volver a la lista
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
