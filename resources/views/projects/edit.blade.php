<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    {{ __('Editar proyecto') }}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Formulario de edición de proyecto --}}
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                {{-- Nombre --}}
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        {{ __('Nombre') }}
                                    </label>
                                    <div class="mt-1">
                                        <input id="name" type="text" name="name" value="{{ $project->name }}"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                    </div>
                                </div>
                                
                                {{-- Descripción --}}
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">
                                        {{ __('Descripción') }}
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description" name="description" rows="3"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>{{ $project->description }}</textarea>
                                    </div>
                                </div>

                                {{-- Tecnologías --}}
                                <div class="mt-1">
                                    <label for="technologies" class="block text-sm font-medium text-gray-700">
                                        {{ __('Tecnologías') }}
                                    </label>
                                    <div class="mt-1">
                                        <select id="technologies" name="technologies[]" multiple
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                            @php
                                                $selectedTechs = json_decode($project->technologies, true) ?? [];
                                            @endphp
                                            <option value="PHP" {{ in_array('PHP', $selectedTechs) ? 'selected' : '' }}>PHP</option>
                                            <option value="Laravel" {{ in_array('Laravel', $selectedTechs) ? 'selected' : '' }}>Laravel</option>
                                            <option value="Vue.js" {{ in_array('Vue.js', $selectedTechs) ? 'selected' : '' }}>Vue.js</option>
                                            <option value="React" {{ in_array('React', $selectedTechs) ? 'selected' : '' }}>React</option>
                                            <option value="Angular" {{ in_array('Angular', $selectedTechs) ? 'selected' : '' }}>Angular</option>
                                            <option value="JavaScript" {{ in_array('JavaScript', $selectedTechs) ? 'selected' : '' }}>JavaScript</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Equipo --}}
                                <div class="mt-1">
                                    <label for="team" class="block text-sm font-medium text-gray-700">
                                        {{ __('Equipo') }}
                                    </label>
                                    <div class="mt-1">
                                        <select id="team" name="team"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                            @php
                                                $teams = ['David', 'Maria', 'Juan', 'Pedro'];
                                            @endphp
                                            @foreach ($teams as $member)
                                                <option value="{{ $member }}" {{ $project->team == $member ? 'selected' : '' }}>{{ $member }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Servidor --}}
                                <div class="mt-1">
                                    <label for="server_config" class="block text-sm font-medium text-gray-700">
                                        {{ __('Servidor') }}
                                    </label>
                                    <div class="mt-1">
                                        <select id="server_config" name="server_config"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                            @php
                                                $servers = ['Local', 'AWS', 'Digital Ocean'];
                                            @endphp
                                            @foreach ($servers as $server)
                                                <option value="{{ $server }}" {{ $project->server_config == $server ? 'selected' : '' }}>{{ $server }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Fecha de inicio --}}
                                <div class="mt-1">
                                    <label for="start_date" class="block text-sm font-medium text-gray-700">
                                        {{ __('Fecha de inicio') }}
                                    </label>
                                    <div class="mt-1">
                                        <input id="start_date" type="date" name="start_date" value="{{ $project->start_date }}"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                    </div>
                                </div>

                                {{-- ID del usuario --}}
                                <div class="mt-1">
                                    <input id="user_id" type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                </div>

                            </div>
                        </div>

                        {{-- Botones --}}
                        <div class="p-6 flex justify-between">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border text-sm text-green-700 leading-5 font-medium rounded-md border-green-700">
                                {{ __('Actualizar proyecto') }}
                            </button>
                            <a href="{{ route('projects.index') }}" 
                                class="inline-flex items-center px-4 py-2 border text-sm text-gray-700 leading-5 font-medium rounded-md border-gray-500 hover:bg-gray-100">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
