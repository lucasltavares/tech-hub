<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Salas do evento') }}
            {{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto p-4">
        <div class="overflow-x-auto">
            <div class="flex justify-end p-4">
            </div>
            <div class="max-w-md mx-auto">
    <!-- Sala 1 -->
    <div x-data="{ isOpen: false }" class="bg-white shadow-md rounded-lg mb-4 p-4">
      <div class="flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Sala 1 (3 ativos)</h3>
        <button @click="isOpen = !isOpen" class="text-gray-600 hover:text-gray-800">
          <svg :class="{'rotate-180': isOpen}" class="h-5 w-5 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
      </div>
      <div x-show="isOpen" class="mt-2 space-y-1">
        <div class="flex items-center text-gray-700">
          <span class="mr-2">💻</span> Computador Dell 1234
        </div>
        <div class="flex items-center text-gray-700">
          <span class="mr-2">📽️</span> Projetor Epson X200
        </div>
        <div class="flex items-center text-gray-700">
          <span class="mr-2">🎛️</span> Mesa de Som Yamaha
        </div>
      </div>
    </div>

    <!-- Sala 2 -->
    <div x-data="{ isOpen: false }" class="bg-white shadow-md rounded-lg mb-4 p-4">
      <div class="flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Sala 2 (2 ativos)</h3>
        <button @click="isOpen = !isOpen" class="text-gray-600 hover:text-gray-800">
          <svg :class="{'rotate-180': isOpen}" class="h-5 w-5 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
      </div>
      <div x-show="isOpen" class="mt-2 space-y-1">
        <div class="flex items-center text-gray-700">
          <span class="mr-2">💻</span> Notebook Lenovo L390
        </div>
        <div class="flex items-center text-gray-700">
          <span class="mr-2">🖥️</span> Monitor Samsung 24"
        </div>
      </div>
    </div>

    <!-- Sala 3 -->
    <div x-data="{ isOpen: false }" class="bg-white shadow-md rounded-lg mb-4 p-4">
      <div class="flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Sala 3 (1 ativo)</h3>
        <button @click="isOpen = !isOpen" class="text-gray-600 hover:text-gray-800">
          <svg :class="{'rotate-180': isOpen}" class="h-5 w-5 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
      </div>
      <div x-show="isOpen" class="mt-2 space-y-1">
        <div class="flex items-center text-gray-700">
          <span class="mr-2">📡</span> Roteador TP-Link AC1750
        </div>
      </div>
    </div>

  </div>

        </div>
    </div>
    </div>
</x-app-layout>
