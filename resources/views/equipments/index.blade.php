<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                        <th class="py-3 px-6 text-left">Localização</th>
                        <th class="py-3 px-6 text-left">Descrição</th>
                        <th class="py-3 px-6 text-center">Salas</th>
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
                                <span class="font-medium">{{ $equipment->location }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{  $equipment->description }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">{{ $equipment->rooms }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</x-app-layout>
