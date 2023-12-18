<x-app-layout>
    <div class="py-8">
        <h1 class="mb-3 text-4xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><span class="text-blue-600 dark:text-blue-500">
            {{$servicio->nombre}}
        </span></h1>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('BuscarColecciones', ['id' =>$id])
        </div>
    </div>
</x-app-layout>