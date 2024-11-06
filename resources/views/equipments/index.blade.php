<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ open: false }">
        <div class="container mx-auto p-4">
        <div class="overflow-x-auto">
            <div class="flex justify-end p-4">
                <a href="{{ route('equipments.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out">
                    Cadastrar Equipamento
                </a>
            </div>
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nome</th>
                        <th class="py-3 px-6 text-left">Tipo</th>
                        <th class="py-3 px-6 text-left">Descrição</th>
                        <th class="py-3 px-6 text-left">Fornecedor</th>
                        <th class="py-3 px-6 text-left">Modelo</th>
                        <th class="py-3 px-6 text-left">Nº de série</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($equipments as $equipment)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $equipment->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $equipment->type }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $equipment->description }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $equipment->provider }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $equipment->model }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $equipment->serial_number }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $equipment->rooms_id ? 'Yes' : 'Não alocado' }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                               <a href="#" @click="open = true"> 
                                    <span class="font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Modal -->
                    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                            <!-- Cabeçalho do modal -->
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Editar Ativo</h2>
                                <button @click="open = false" class="text-gray-600 hover:text-gray-800">&times;</button>
                            </div>

                            <!-- Formulário de Edição -->
                            <form action="{{ route('equipments.update', $equipment->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                                    <input type="text" id="nome" name="nome" value="{{ old('nome', $equipment->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                                    <input type="text" id="tipo" name="tipo" value="{{ old('tipo', $equipment->type) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                                    <input type="text" id="modelo" name="modelo" value="{{ old('modelo', $equipment->model) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="numero_serie" class="block text-sm font-medium text-gray-700">Nº de Série</label>
                                    <input type="text" id="numero_serie" name="numero_serie" value="{{ old('numero_serie', $equipment->serial_number) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                                    <textarea id="descricao" name="descricao" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('descricao', $equipment->description) }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="fornecedor" class="block text-sm font-medium text-gray-700">Fornecedor</label>
                                    <input type="text" id="fornecedor" name="fornecedor" value="{{ old('fornecedor', $equipment->provider) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="evento" class="block text-sm font-medium text-gray-700">Evento</label>
                                    <select id="evento" name="evento" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="sala" class="block text-sm font-medium text-gray-700">Sala</label>
                                    <input type="text" id="sala" name="sala" value="{{ old('sala', $equipment->rooms_id) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Botões de ação -->
                                <div class="flex justify-end">
                                    <button type="button" @click="open = false" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 mr-2">Cancelar</button>
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</x-app-layout>
