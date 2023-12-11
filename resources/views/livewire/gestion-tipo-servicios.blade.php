<div class="mx-2">
    <div class="relative w-full">
        <input wire:model.live="search" type="text" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-green-500" placeholder="Busqueda" required>
        @livewire('AgregarTipoServicio')
    </div>
    <div class="my-3">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$servicio->nombre}}
                        </th>
                        <td class="px-4 py-4">
                            {{$servicio->descripcion}}
                        </td>
                        <td class="px-4 py-4 flex flex-row">
                            <a wire:click="Editar({{$servicio}})" class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#65a30d" d="M9 15v-4.25l9.175-9.175q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4q0 .375-.138.738t-.437.662L13.25 15H9Zm10.6-9.2l1.425-1.4l-1.4-1.4L18.2 4.4l1.4 1.4ZM5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h8.925L7 9.925V17h7.05L21 10.05V19q0 .825-.588 1.413T19 21H5Z"/></svg>
                            </a>
                            <a wire:click="Borrar({{$servicio->id}})" wire:confirm="Seguro que desea eliminar este tipo de servicio?" class="cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#dc2626" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7Zm2-4h2V8H9v9Zm4 0h2V8h-2v9Z"/></svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $servicios->links() }}
    </div>
    <x-dialog-modal wire:model.live="tipoModalStatus" class="p-0">
        <x-slot name="title">
            {{ __('Editar Servicio') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-3">
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <x-input wire:model="nombre" id="nombre" type="text" class="mt-1 w-full" autocomplete="nombre"/>
                <x-input-error for="nombre" class="mt-2" />
            </div>
            <div class="my-3">
                <x-label for="descripcion" value="{{ __('Descripcion') }}" />
                <x-input wire:model="descripcion" id="descripcion" type="text" class="mt-1 w-full" autocomplete="descripcion"/>
                <x-input-error for="descripcion" class="mt-2" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-action-message class="mr-3 mt-2" on="editado">
                {{ __('Editado') }}
            </x-action-message>
            <x-secondary-button class="mx-3" wire:click="$set('tipoModalStatus',false)">
                {{__('Cancelar')}}
            </x-secondary-button>
            <x-button wire:click="confirmar()">
                {{__('Guardar')}}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>