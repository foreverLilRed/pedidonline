<div class="mx-3">
    <input wire:model.live="search" type="text" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar etiquetas" required>
    <div class="flex items-center my-3">
        <input wire:model="nombre_add" type="text" id="first_name" class="flex-1 mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Crear etiqueta" required>
        <button class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
            <span wire:click='agregar()' class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Agregar
            </span>
        </button>
    </div>
    <div class="flex flex-wrap">
        @foreach ($etiquetas as $etiqueta)
            <span class="flex items-center bg-purple-100 text-purple-800 text-sm font-bold me-2 my-1 px-2.5 py-0.5 rounded-full dark:bg-purple-900 dark:text-purple-300 hover:bg-purple-300">
                {{$etiqueta->nombre}}
                <div wire:click='eliminar({{$etiqueta->id}})' class="ml-1 rounded-full hover:bg-red-500 p-0.5 hover:border border-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 256 256"><path fill="#000000" d="M208.49 191.51a12 12 0 0 1-17 17L128 145l-63.51 63.49a12 12 0 0 1-17-17L111 128L47.51 64.49a12 12 0 0 1 17-17L128 111l63.51-63.52a12 12 0 0 1 17 17L145 128Z"/></svg>
                </div>
            </span>
        @endforeach
    </div>
</div>
