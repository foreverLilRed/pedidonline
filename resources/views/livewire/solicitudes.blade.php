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
                            <button type="button" class="text-white w-full bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Ver estado</button>
                        </div>
                    @else
                        <div class="flex flex-row mt-4 gap-x-2">
                            <button type="button" wire:click="editarRequerimiento({{$solicitud->id}})" class="py-2.5 w-1/2 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Editar</button>
                            <button type="button" wire:click="$set('ofertas',true)" class="text-white w-1/2 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Ofertas</button>
                        </div>
                    @endif
                </div>
                <x-dialog-modal wire:model.live="ofertas" class="p-0">
                    <x-slot name="title">
                        {{ __('Ofertas') }}
                    </x-slot>
                    <x-slot name="content">
                    </x-slot>
                    <x-slot name="footer">
                        <x-secondary-button class="mx-3" wire:click="$set('ofertas',false)">
                            {{__('Salir')}}
                        </x-secondary-button>
                    </x-slot>
                </x-dialog-modal>
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
</div>
