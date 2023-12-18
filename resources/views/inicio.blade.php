<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('Inicio')
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <p class="tracking-tighter text-gray-500 md:text-lg dark:text-gray-400 text-center">Estadisticas</p>
            @livewire('Estadisticas')
        </div>
    </div>
</x-app-layout>
