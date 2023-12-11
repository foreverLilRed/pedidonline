<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-1/2 mx-2">
                    <div class="m-auto text-center my-3">
                        <p class="text-2xl">Tipos de Servicio</p>
                    </div>
                    @livewire('GestionTipoServicios')
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-1/2 mx-2">
                    <div class="m-auto text-center my-3">
                        <p class="text-2xl">Etiquetas</p>
                    </div>
                    @livewire('EditarEtiquetas')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
