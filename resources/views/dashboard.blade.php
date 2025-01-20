<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto p-4">
            <div class="min-h-screen flex flex-col">

                <!-- Main Content -->
                <main class="flex-grow container mx-auto px-6 py-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Eventos Ativos -->
                        <div class="bg-white shadow rounded-lg p-4 flex items-center justify-between">
                            <div>
                                <h2 class="text-sm font-medium text-gray-600">Eventos Ativos</h2>
                                <p class="text-2xl font-bold text-blue-500">{{ $events }}</p>
                            </div>
                            <div class="text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-2-8h2a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h2" />
                                </svg>
                            </div>
                        </div>

                        <!-- Equipamentos em Uso -->
                        <div class="bg-white shadow rounded-lg p-4 flex items-center justify-between">
                            <div>
                                <h2 class="text-sm font-medium text-gray-600">Equipamentos em Uso</h2>
                                <p class="text-2xl font-bold text-green-500">{{ $equipments }}</p>
                            </div>
                            <div class="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5L19.5 4.5m0 0V10.5m0-6H13.5" />
                                </svg>
                            </div>
                        </div>

                        <!-- Eventos Finalizados -->
                        <div class="bg-white shadow rounded-lg p-4 flex items-center justify-between">
                            <div>
                                <h2 class="text-sm font-medium text-gray-600">Eventos Finalizados</h2>
                                <p class="text-2xl font-bold text-yellow-500">{{ $events }}</p>
                            </div>
                            <div class="text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h7.5M6 6h1.5m1.5 14.25V9m0 0H7.5" />
                                </svg>
                            </div>
                        </div>

                        <!-- Clientes Ativos -->
                        <div class="bg-white shadow rounded-lg p-4 flex items-center justify-between">
                            <div>
                                <h2 class="text-sm font-medium text-gray-600">Clientes Ativos</h2>
                                <p class="text-2xl font-bold text-purple-500">{{ $customers }}</p>
                            </div>
                            <div class="text-purple-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75a4.5 4.5 0 019 0v2.25h2.25A4.5 4.5 0 0120.25 13.5v5.25a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18.75V13.5a4.5 4.5 0 010-6.75v0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </main>
        </div>
    </div>
</x-app-layout>
