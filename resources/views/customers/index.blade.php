<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="Customers()">
        <div class="container mx-auto p-4">
        <div class="overflow-x-auto">
            <div class="flex justify-end p-4">
                <a href="{{ route('customers.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out">
                    Cadastrar cliente
                </a>
            </div>
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Segment</th>
                        <th class="py-3 px-6 text-center">Email</th>
                        <th class="py-3 px-6 text-center">Register date</th>
                        <th class="py-3 px-6 text-center">Plan</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($customers as $customer)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $customer->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ $customer->segment }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">{{ $customer->email }}</td>
                        <td class="py-3 px-6 text-center">{{ $customer->created_at }}</td>
                        <td class="py-3 px-6 text-center">{{ $customer->plan }}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a @click="openModal" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                    <span class="font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </span>
                                </a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                        <span class="font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 48 48">
                                                <path fill="#F44336" d="M21.5 4.5H26.501V43.5H21.5z" transform="rotate(45.001 24 24)"></path><path fill="#F44336" d="M21.5 4.5H26.5V43.501H21.5z" transform="rotate(135.008 24 24)"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Edit Modal -->
    <div x-show="open" x-transition class="modal fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Cabeçalho do modal -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Editar Cliente</h2>
                <button @click="open = false" class="text-gray-600 hover:text-gray-800">&times;</button>
            </div>

            <!-- Formulário de Edição -->
            <form x-bind:action="`/customers/update/${customer.id}`" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input x-model="equipment.name" type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="tipo" class="block text-sm font-medium text-gray-700">Segmento</label>
                    <input x-model="equipment.type" type="text" id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="modelo" class="block text-sm font-medium text-gray-700">Email</label>
                    <input x-model="equipment.model" type="text" id="model" name="model" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="descricao" class="block text-sm font-medium text-gray-700">Plano</label>
                    <textarea x-model="equipment.description" id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Botões de ação -->
                <div class="flex justify-end">
                    <button type="button" @click="open = false" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script defer>
        document.addEventListener('alpine:init', () => {
            Alpine.data('Customers', () => ({
                customerId: '',
                customer: '',
                open: false,

                openModal(customer) {
                     this.open = true;
                     this.customer = customer;
                }
            }));
        });
    </script>
</x-app-layout>
