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
                    {{ __('Nuevo proyecto') }}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Formulario de creación de proyecto --}}
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        {{ __('Nombre') }}
                                    </label>
                                    <div class="mt-1">
                                        <input id="name" type="text" name="name"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">
                                        {{ __('Descripción') }}
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description" name="description" rows="3"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <label for="technologies" class="block text-sm font-medium text-gray-700">
                                        {{ __('Tecnologías') }}
                                    </label>
                                    <div class="mt-1">
                                        <select id="technologies" name="technologies[]" multiple
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                            <option value="PHP">PHP</option>
                                            <option value="Laravel">Laravel</option>
                                            <option value="Vue.js">Vue.js</option>
                                            <option value="React">React</option>
                                            <option value="Angular">Angular</option>
                                            <option value="JavaScript">JavaScript</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <label for="team" class="block text-sm font-medium text-gray-700">
                                        {{ __('Equipo') }}
                                    </label>
                                    <div class="mt-1">
                                        <select id="team" name="team"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                            <option selected>David</option>
                                            <option>Maria</option>
                                            <option>Juan</option>
                                            <option>Pedro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <label for="server_config" class="block text-sm font-medium text-gray-700">
                                        {{ __('Servidor') }}
                                    </label>
                                    <div class="mt-1">
                                        <select id="server_config" name="server_config"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                            <option selected>Local</option>
                                            <option>AWS</option>
                                            <option>Digital Ocean</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <label for="start_date" class="block text-sm font-medium text-gray-700">
                                        {{ __('Fecha de inicio') }}
                                    </label>
                                    <div class="mt-1">
                                        <input id="start_date" type="date" name="start_date"
                                            class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <input id="user_id" type="hidden" name="user_id" value="{{ auth()->user()->id }}"
                                        class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                                        required>
                                </div>

                            </div>
                        </div>
                        <div class="p-6">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border text-sm text-green-700 leading-5 font-medium rounded-md border-green-700">
                                {{ __('Crear proyecto') }}
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
