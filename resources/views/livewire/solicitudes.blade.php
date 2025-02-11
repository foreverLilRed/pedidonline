<div>
    @if (isset($solicitudes))
        <div class="mx-auto flex flex-wrap mt-5 w-11/12 justify-center gap-5 text-center" wire:poll>
            @foreach ($solicitudes as $solicitud)
                <div class="max-w-sm p-3 m-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <p class="tracking-normal text-gray-500 md:text-lg dark:text-gray-400">
                        {{$solicitud->servicios->nombre}}
                    </p>
                    <div class="py-2">
                        @if ($solicitud->estado == 1)
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Asignado</span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Sin asignar</span>
                        @endif
                    </div>
                    <div class="flex items-center my-2">
                        <p class="ml-2 text-lg font-medium tracking-tight text-gray-900 dark:text-white">
                            {{$solicitud->descripcion}}
                        </p>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="basis-1/2 flex items-center justify-center gap-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#059669" d="M10.5 8a3 3 0 1 0 0 6a3 3 0 0 0 0-6M9 11a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0M2 7.25A2.25 2.25 0 0 1 4.25 5h12.5A2.25 2.25 0 0 1 19 7.25v7.5A2.25 2.25 0 0 1 16.75 17H4.25A2.25 2.25 0 0 1 2 14.75zm2.25-.75a.75.75 0 0 0-.75.75V8h.75A.75.75 0 0 0 5 7.25V6.5zm-.75 6h.75a2.25 2.25 0 0 1 2.25 2.25v.75h8v-.75a2.25 2.25 0 0 1 2.25-2.25h.75v-3h-.75a2.25 2.25 0 0 1-2.25-2.25V6.5h-8v.75A2.25 2.25 0 0 1 4.25 9.5H3.5zm14-4.5v-.75a.75.75 0 0 0-.75-.75H16v.75c0 .414.336.75.75.75zm0 6h-.75a.75.75 0 0 0-.75.75v.75h.75a.75.75 0 0 0 .75-.75zm-14 .75c0 .414.336.75.75.75H5v-.75a.75.75 0 0 0-.75-.75H3.5zm.901 3.75A2.999 2.999 0 0 0 7 20h10.25A4.75 4.75 0 0 0 22 15.25V10a3 3 0 0 0-1.5-2.599v7.849a3.25 3.25 0 0 1-3.25 3.25z"/></svg>
                                <b>{{$solicitud->monto}}</b>
                        </div>
                        <div class="basis-1/2 flex items-center justify-center gap-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#000000" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"/></svg>
                                <b>{{$solicitud->ubicacion}}</b>
                        </div>
                    </div>
                    @if ($solicitud->estado == 1)
                        <div class="mt-4 mb-0">
                            <button type="button" wire:click='verEstado({{$solicitud->id}})' class="text-white w-full bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Ver estado</button>
                        </div>
                    @else
                        <div class="flex flex-row mt-4 gap-x-2">
                            <button type="button" wire:click="editarRequerimiento({{$solicitud->id}})" class="py-2.5 w-1/2 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Editar</button>
                            <button type="button" wire:click="mostrarOfertas({{$solicitud->id}})" class="text-white w-1/2 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Ofertas</button>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
    <x-dialog-modal wire:model.live="modal" class="p-0">
        <x-slot name="title">
            {{ __('Editar Requerimiento') }}
        </x-slot>
        <x-slot name="content">
                <div class="relative z-0 w-full mb-5 group mt-5">
                    <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion:</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="#000000" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"/></svg>
                        </div>
                        <input wire:model='direccion' id="direccion" name="direccion" type="text" id="direccion" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <x-input-error for="direccion" />
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <label for="oferta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oferta:</label>
                    <div class="flex items-center">
                        <p class="text-lg font-medium mr-3">S/.</p>
                        <input wire:model='oferta' name="oferta" id="oferta" required type="number" id="oferta" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="min S/10" pattern="^\d{5}(-\d{4})?$" required>
                    </div>
                        <x-input-error for="oferta" />
                </div>

                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Describe el problema</label>
                <textarea wire:model='descripcion' id="descripcion" required name="descripcion" id="descripcion" rows="4" class="block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                <x-input-error for="descripcion" />
        </x-slot>
        <x-slot name="footer">
            <x-action-message class="mr-3 mt-2.5 text-lg font-medium" on="requerimiento_editado">
                {{ __('Guardado') }}
            </x-action-message>
            <x-secondary-button class="mx-3" wire:click="$set('modal',false)">
                {{__('Cancelar')}}
            </x-secondary-button>
            <x-secondary-button wire:click="updateRequerimiento">
                {{__('Guardar')}}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model.live="estado" class="p-0">
        <x-slot name="title">
            {{ __('Estado del Servicio') }}
        </x-slot>
        <x-slot name="content">
            <div class="mx-auto flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 36 36"><circle cx="16.86" cy="9.73" r="6.46" fill="#4f46e5"/><path fill="#4f46e5" d="M21 28h7v1.4h-7z"/><path fill="#4f46e5" d="M15 30v3a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1V23a1 1 0 0 0-1-1h-7v-1.47a1 1 0 0 0-2 0V22h-2v-3.58a32.12 32.12 0 0 0-5.14-.42a26 26 0 0 0-11 2.39a3.28 3.28 0 0 0-1.88 3V30Zm17 2H17v-8h7v.42a1 1 0 0 0 2 0V24h6Z"/></svg>
            </div>
            @if (isset($estado_servicio))
            <div class="text-center mt-2" wire:poll="consultarEstado">
                @if ($estado_servicio == 0)
                    <p class="text-lg font-semibold">
                        {{$colaborador}} esta trabajando en tu problema
                    </p>

                @elseif($estado_servicio == 1)
                    <p class="text-lg font-semibold">
                        {{$colaborador}} soluciono tu problema?
                    </p>
                    <div class="flex items-center justify-center mt-4">
                        <button type="button" wire:click="confirmarServicio({{$solicitud->id}})" class="text-white bg-gradient-to-br from-green-600 to-sky-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Confirmar Servicio</button>
                        <button type="button" class="text-white bg-gradient-to-br from-red-600 to-yellow-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Algo salio mal</button>
                    </div>
                @elseif($estado_servicio == 2)
                    <div class="flex flex-row justify-center items-center gap-x-1">
                        <p class="text-lg font-semibold">Servicio Completado</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 128 128"><path fill="#fcc21b" d="M72.59 58.36c-.65 1.18-1.3 2.37-1.92 3.55l-.52.98l-.05.08c1.83 2.43 3.4 5.04 4.64 7.69c.18.37.35.75.52 1.13c1.77-.52 3.55-.81 5.29-.88c-1.31-3.47-3.33-7.07-6.3-10.71c-.52-.63-1.09-1.23-1.66-1.84m5.34 26.8c-.37 0-.75.02-1.13.06c-2.07 6.54-8.79 9.4-15.89 8.52c-11.15-1.37-21.38-9.85-24.81-20.5c-.7-2.13-.94-4.25-1.02-6.51c-.2-5.82.92-12.05 6.75-14.46l.07-.03c.19-.08.38-.13.57-.19c-.42-.63-.85-1.29-1.26-2.02c-.58-1.03-.93-2.12-1.14-3.18c-6.25 2.18-10.06 7.7-12.73 13.78c-2.55 5.82-19.12 50.57-19.12 50.57l-2.22 6c-.76 2.08-1.94 4.17-1.94 6.44c0 2.65 2.36 4.46 5.02 3.72c1.78-.5 3.74-1.42 5.55-2.14c3.83-1.56 10.93-4.63 10.93-4.63l29.68-12.22s14.31-5.18 20.33-10.85c2.92-2.75 5.26-6.71 6.29-11.44c-.21-.11-.43-.23-.65-.32c-1-.41-2.07-.6-3.28-.6M55.68 47.54c.77 1.47 1.62 3.14 1.94 5.21c1.42.6 2.78 1.32 4.07 2.17c.45-1.44.92-2.86 1.41-4.31c-.21-.13-.42-.28-.63-.4c-2.11-1.2-4.48-2.22-6.95-2.98c.06.11.11.2.16.31"/><path fill="#d7598b" d="M111.93 31.98c-.16 1-.12 2.42.04 3.4c.17 1.1.42 2.27.82 3.31c.57 1.46 1.27.95 2.7.75c.99-.13 1.91-.06 2.89-.26c1.03-.21 2.05-.48 3.08-.68c2.42-.46 3.63-1 3.12-3.55c-.37-1.84-.98-3.67-1.46-5.49c-.44-.39-1.29-.17-1.81-.05c-.92.21-1.83.26-2.75.42c-1.66.27-3.4.47-5.03.86c-.83.18-1.47.43-1.6 1.29"/><path fill="#40c0e7" d="M98.87 62c.38.87 1.31.65 2.22.85c2.02.46 4.07.41 6.14.41c.77 0 2.72.29 3.27-.4c.44-.56.06-1.67 0-2.32l-.24-2.54c-.04-.4.03-3.02-.31-3.24c-.58-.39-1.68-.2-2.34-.19c-1.21.04-2.4.19-3.63.19c-1.59 0-3.31.02-4.85.4c-.54 1.43-.39 2.92-.39 4.49c0 .73-.16 1.67.13 2.35"/><path fill="#d7598b" d="M91.92 105.19c-.83-1.23-1.24-2.88-3.09-2.7c-1.74.17-3.28 1.55-4.81 2.3c-.99.48-1.71 1.34-1.91 2.42c-.23 1.23.28 2.21.87 3.26c.44.79.73 1.7 1.08 2.53c.36.86.91 1.63 1.28 2.48c.25.6.17.55.72.76c.28.1.74.18 1.04.19c1.75.05 3.65-1.72 4.92-2.76c1.02-.82 3.06-1.34 2.85-2.89c-.15-1.15-.95-2.26-1.5-3.25c-.46-.81-.95-1.59-1.45-2.34"/><path fill="#40c0e7" d="M111.46 113.59c-.23-.15-.45-.24-.65-.27c-1.06-.19-1.76 1.09-2.6 1.92c-1.01.97-2.21 1.74-3.13 2.8c-.99 1.16-.22 2.2.8 2.82c1.11.67 2.1 1.51 3.2 2.21c.98.63 1.77 1.19 2.86.51c.99-.62 1.54-1.71 2.22-2.62c1.26-1.7 3.41-3.07 1.3-4.94c-1.18-1.05-2.7-1.57-4-2.43M9 55.06c.05-.46 1.35-4.14.96-4.25c-.89-.22-1.73-.64-2.63-.88c-1.04-.27-2.11-.48-3.08-.96c-1.17-.58-1.89-.29-2.38.36c-.69.92-.91 2.57-1.24 3.58c-.26.79-.42 1.69.14 2.25c.64.63 1.7.99 2.53 1.26c1.04.34 2.2.94 3.27 1.04c1.46.16 2.28-1.16 2.43-2.4m59.63-35.52c1.3.58 2.56.91 3.89 1.29c.47.14.77.37 1.26.11c.63-.32 1.33-1.43 1.68-2.04c.83-1.51 1.44-3 2.01-4.59c.31-.85 1.23-2.23 1-3.13c-.2-.76-1.3-1.23-1.92-1.56c-.83-.43-1.62-1.01-2.46-1.38c-1.08-.47-2.56-.98-3.72-1.15c-.64-.1-1.09.16-1.44.57c-.32.37-.56.86-.8 1.31c-1.21 2.32-2.7 5.81-2.65 8.49c.02 1.27 2.19 1.65 3.15 2.08"/><path fill="#d7598b" d="M16.65 33.3c.73 1.12 1.38 2.14 2.24 3.2c.84 1.02 1.44 1.22 2.47.37c.65-.52 1.39-.93 2.01-1.49c.59-.52 1.08-1.18 1.67-1.72c.42-.39 1.25-.78 1.49-1.32c.33-.76-.36-1.42-.78-1.98c-.52-.7-.92-1.46-1.49-2.16c-.73-.88-1.52-1.71-2.34-2.53c-.67-.67-1.48-1.7-2.24-2.22c-.2-.13-.43-.22-.67-.25c-.91-.13-1.99.39-2.7.81c-.97.57-1.91 1.42-2.76 2.17c-1.33 1.18-.04 2.73.74 3.85c.78 1.08 1.62 2.13 2.36 3.27"/><path fill="#40c0e7" d="M16.73 9.97c.67.72 1.5 1.59 2.44 2c.83.37 1.68-.37 2.35-.78c.75-.46 1.36-1.13 1.92-1.8c.51-.62 1.2-1.29 1.58-2.01c.44-.82-.16-1.13-.77-1.62c-.73-.6-1.47-1.22-2.09-1.94c-.84-.98-1.68-2.08-2.57-2.98c-.3-.31-.66-.39-1.04-.32c-1.19.2-2.6 1.87-3.3 2.42c-.56.43-1.54 1.19-1.71 1.9c-.21.8.26 1.57.66 2.24c.65 1.08 1.65 1.95 2.53 2.89"/><path fill="#ed6c30" d="M45.86 29.19c1.38 4.78-2.3 8.47-2.7 13c-.12 1.31-.12 2.62.1 3.88c.14.82.37 1.62.78 2.35c.54.96 1.16 1.83 1.73 2.73c.56.87 1.06 1.75 1.4 2.76c.75 2.24.23 4.26-.09 6.48c-.26 1.77-1.16 3.44-2.24 4.84c-.33.43-1.24.98-1.02 1.61c.03.11.23.15.52.15c1.2 0 4.03-.73 4.44-.92c1.8-.87 2.85-2.63 3.78-4.33c1.38-2.52 2.27-5.46 1.88-8.35c-.08-.66-.26-1.28-.48-1.88c-.67-1.79-1.78-3.39-2.41-5.22c-.08-.22-.16-.44-.22-.67c-.92-3.58 1.29-7.09 3.15-9.94c1.83-2.79 2.52-6.89 1.22-10.09c-.66-1.62-1.72-3.24-3.01-4.43c-1.53-1.42-3.86-2.71-3.6-5.16c.22-2.13 1.66-4.37 2.75-6.13c.54-.89 2.24-2.71 2.18-3.73c-.05-1.04-1.5-1.56-2.19-2.17c-1.56-1.38-2.8-2.44-4.8-3.07a2.93 2.93 0 0 0-.94-.17c-1.29 0-1.74 1.17-2.46 2.43c-1.32 2.33-2.62 4.79-3.5 7.31c-1.66 4.68-1.91 9.51 1.68 13.89c1.24 1.53 3.53 3.03 4.05 4.83m16.22 40.35c.25.26.48.37.69.37c.39 0 .7-.4.95-.87c.19-.36.34-.73.46-1.12c.67-2.25 2-4.48 3.1-6.56c.2-.37.4-.73.59-1.09c.76-1.43 1.54-2.86 2.35-4.28c.63-1.12 1.26-2.25 1.94-3.33c1.78-2.85 4.18-5.89 7.2-7.48c1.9-1.02 4.04-1.49 5.95-2.5c2.17-1.13 3.44-2.84 4.85-4.79c1.4-1.93 2.13-4.31 3.41-6.34c.54-.86.46-1.62 1.41-2.22c2.11-1.32 4.64-.87 6.98-1.32c5.53-1.06 6.02-8.35 10.54-10.98c.95-.55 1.92-1.06 2.88-1.57c.56-.3 1.64-.67 2.03-1.22c.67-.94-.6-2.17-.98-3.03c-.66-1.48-1.65-2.97-2.5-4.35c-.72-1.16-1.36-2.21-2.64-2.21l-.25.02c-2.89.28-5.47 1.55-7.32 3.76c-2.25 2.7-2.55 6.87-6.09 8.35c-2.3.96-5.01.58-7.19 1.91c-2.58 1.58-3.41 4.7-4.13 7.44c-.54 2-.57 4.41-2.09 5.98c-2.06 2.11-5.19 2.37-7.83 3.5c-.71.31-1.39.68-2 1.16c-3.35 2.64-5.25 6.97-6.75 10.85c-.61 1.59-1.16 3.21-1.7 4.83c-.5 1.51-.99 3.02-1.46 4.54c-.24.78-.5 1.56-.74 2.35c-.61 1.98-1.17 4.01-1.89 5.96c-.5 1.25-.81 3.16.23 4.24m65.36 17.26c-.19-.2-.46-.22-.73-.22l-.31.01l-.17-.01c-.6-.04-1.1-.3-1.68-.5c-2.67-.93-4.4-1.7-6.76-3.29c-2.66-1.79-5.71-3.46-8.99-3.61l-.38-.01c-3.24 0-6.23 1.71-9.48 1.71h-.02c-3.6-.02-6.71-2.58-9.55-4.47c-.24-.16-.48-.31-.74-.45c-2.23-1.26-4.63-1.81-7.05-1.84c-.06 0-.13-.02-.19-.02c-1.67 0-3.35.26-4.99.72c-1.6.44-3.15 1.08-4.63 1.87a37.476 37.476 0 0 0-5.99 3.97c-1.03.83-2.16 1.78-2.86 2.93c-.38.61-.9 2.93.07 3.31l.13.03c.38 0 1-.4 1.27-.57c2.16-1.33 4.44-2.49 6.87-3.25c1.99-.63 4.08-1.09 6.15-1.17c.17-.01.35-.02.52-.02c1.49 0 2.97.23 4.41.79l.06.03c2.01.8 3.69 2.18 5.35 3.53c2.44 1.98 5.15 2.42 7.91 2.42c2.15 0 4.33-.26 6.46-.26c2.23 0 4.39.29 6.38 1.46c1.62.97 3.08 2.24 4.33 3.59c1.38 1.47 3.14 2.7 5.21 3.02c.88.14 1.68.21 2.57.22h.02c1.5 0 2.07-1.73 2.83-2.72c1.04-1.34 1.76-2.88 2.71-4.29c.4-.62 1.95-2.23 1.27-2.91"/></svg>
                    </div>
                @endif
            </div>
            @endif
        </x-slot>
    </x-dialog-modal>

        <x-dialog-modal wire:model.live="ofertas" class="p-0" wire:poll="consultarOfertas">
            <x-slot name="title">
                {{ __('Ofertas') }}
            </x-slot>
            <x-slot name="content">
                @if (isset($total_ofertas))
                    @foreach ($total_ofertas as $oferta)
                        <div class="flex flex-col">
                            <div class="rounded-lg shadow-2xl w-full bg-gray-800 my-1.5 p-2 text-white flex items-center flex-row">
                                <div class="basis-1/2 flex items-center">
                                    <img class="m-1 rounded-full" style="width: 15%" src="https://th.bing.com/th/id/OIG.BvkqUNIavbVGWO7RsV_F?w=1024&h=1024&rs=1&pid=ImgDetMain" alt="image description">
                                    <p class="ml-2 font-bold text-xl">
                                        {{$oferta->colaborador->user->name}}
                                    </p>
                                    @if (isset($oferta->colaborador->calificacion))
                                        <span class="text-sm flex items-center ml-2 px-1 font-extrabold bg-white text-gray-800 rounded dark:bg-gray-700 dark:text-gray-300">
                                            <p class="mt-0.5 mr-1">{{$oferta->colaborador->calificacion}}</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#fdd868" d="m12 18.275l-4.15 2.5q-.275.175-.575.15t-.525-.2q-.225-.175-.35-.437t-.05-.588l1.1-4.725L3.775 11.8q-.25-.225-.312-.513t.037-.562q.1-.275.3-.45t.55-.225l4.85-.425l1.875-4.45q.125-.3.388-.45t.537-.15q.275 0 .537.15t.388.45l1.875 4.45l4.85.425q.35.05.55.225t.3.45q.1.275.038.563t-.313.512l-3.675 3.175l1.1 4.725q.075.325-.05.588t-.35.437q-.225.175-.525.2t-.575-.15z"/></svg>
                                        </span>
                                    @endif
                                </div>
                                <div class="basis-1/2 flex items-center flex-row">
                                    <div class="basis-1/2 text-center flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#059669" d="M10.5 8a3 3 0 1 0 0 6a3 3 0 0 0 0-6M9 11a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0M2 7.25A2.25 2.25 0 0 1 4.25 5h12.5A2.25 2.25 0 0 1 19 7.25v7.5A2.25 2.25 0 0 1 16.75 17H4.25A2.25 2.25 0 0 1 2 14.75zm2.25-.75a.75.75 0 0 0-.75.75V8h.75A.75.75 0 0 0 5 7.25V6.5zm-.75 6h.75a2.25 2.25 0 0 1 2.25 2.25v.75h8v-.75a2.25 2.25 0 0 1 2.25-2.25h.75v-3h-.75a2.25 2.25 0 0 1-2.25-2.25V6.5h-8v.75A2.25 2.25 0 0 1 4.25 9.5H3.5zm14-4.5v-.75a.75.75 0 0 0-.75-.75H16v.75c0 .414.336.75.75.75zm0 6h-.75a.75.75 0 0 0-.75.75v.75h.75a.75.75 0 0 0 .75-.75zm-14 .75c0 .414.336.75.75.75H5v-.75a.75.75 0 0 0-.75-.75H3.5zm.901 3.75A2.999 2.999 0 0 0 7 20h10.25A4.75 4.75 0 0 0 22 15.25V10a3 3 0 0 0-1.5-2.599v7.849a3.25 3.25 0 0 1-3.25 3.25z"/></svg>
                                        <p class="ml-2 mt-0.5 text-lg font-black">
                                            {{$oferta->oferta_colaborador}}
                                        </p>
                                    </div>
                                    <div class="basis-1/2 text-center">
                                        <button type="button" wire:click='crearServicio({{$oferta->oferta_colaborador}},{{$oferta->id}})' class="text-white w-2/3 bg-green-700 hover:bg-green-800 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center mx-auto font-semibold text-lg">Aun no se han recibido ofertas</p>
                @endif
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button class="mx-3" wire:click="$set('ofertas',false)">
                    {{__('Salir')}}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
</div>
