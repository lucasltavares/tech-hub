<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="Equipments()">
        <div class="container mx-auto p-4">
        <div class="overflow-x-auto">
            <div class="flex justify-end p-4">
                <a href="{{ route('equipments.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out">
                    Cadastrar Equipamento
                </a>
            </div>
            @if (isset($equipments) && !$equipments->isEmpty())
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
                               <a href="#" @click="openModal({{ json_encode($equipment) }})" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
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
                    <!-- Edit Modal -->
                    <div x-show="open" x-transition class="modal fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                            <!-- Cabeçalho do modal -->
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Editar Ativo</h2>
                                <button @click="open = false" class="text-gray-600 hover:text-gray-800">&times;</button>
                            </div>

                            <!-- Formulário de Edição -->
                            <form x-bind:action="`/equipments/update/${equipment.id}`" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                                    <input x-model="equipment.name" type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                                    <input x-model="equipment.type" type="text" id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                                    <input x-model="equipment.model" type="text" id="model" name="model" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="numero_serie" class="block text-sm font-medium text-gray-700">Nº de Série</label>
                                    <input x-model="equipment.serial_number" type="text" id="serial_number" name="serial_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                                    <textarea x-model="equipment.description" id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="fornecedor" class="block text-sm font-medium text-gray-700">Fornecedor</label>
                                    <input x-model="equipment.provider" type="text" id="provider" name="provider" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="evento" class="block text-sm font-medium text-gray-700">Evento</label>
                                    <select x-model="eventId" @change="fetchRooms()" id="evento" name="events_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div x-show="eventId" class="mb-4">
                                    <label for="room" class="block text-sm font-medium text-gray-700">Sala</label>
                                    <select id="room" name="rooms_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Selecione uma sala</option>
                                        <template x-for="room in rooms" :key="room.id">
                                            <option :value="room.id" x-text="room.description"></option>
                                        </template>
                                    </select>
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
            @else
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex items-center">
                        <div class="ml-3">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                Nenhum equipamento encontrado
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
    <script defer>
        document.addEventListener('alpine:init', () => {
            Alpine.data('Equipments', () => ({
                eventId: '',
                equipment: '',
                rooms: [],
                open: false,

                openModal(equipment) {
                     this.open = true;
                     this.equipment = equipment;
                },
                // Função para buscar salas via API
                fetchRooms() {
                    if (this.eventId) {
                        fetch(`/events/${this.eventId}/rooms`)
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);
                                this.rooms = data; // Atualiza a lista de salas
                                console.log(this.rooms);
                            })
                            .catch(error => {
                                console.error('Erro ao carregar as salas:', error);
                            });
                    } else {
                        this.rooms = []; // Reseta o select de salas quando não há evento selecionado
                    }
                }
            }));
        });
    </script>
</x-app-layout>
