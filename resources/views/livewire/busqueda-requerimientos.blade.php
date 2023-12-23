<div>
    <select wire:model.live='servicio' wire:change='buscarRequerimientos' class="w-1/2 mx-auto py-3 px-4 pe-9 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
        <option selected>Selecciona un servicio</option>
        @foreach ($colaborador->servicios as $servicio)
            <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
        @endforeach
    </select>

    @if (isset($requerimientos))
        <div class="mx-auto flex flex-wrap mt-5 w-11/12 justify-center gap-5 text-center" wire:poll="buscarRequerimientos">
            @foreach ($requerimientos as $requerimiento)
                <div class="max-w-sm p-3 m-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center">
                        <img class="m-1 rounded-full" style="width: 14%" src="https://th.bing.com/th/id/OIG.BvkqUNIavbVGWO7RsV_F?w=1024&h=1024&rs=1&pid=ImgDetMain" alt="image description">
                        <h5 class="ml-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{$requerimiento->clientes->user->name}}
                        </h5>
                    </div>
                    <p class="my-3 font-normal text-gray-500 dark:text-gray-400">
                        {{ substr($requerimiento->descripcion, 0, 200) . "..." }}
                    </p>

                    <div class="flex items-center mt-4 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#059669" d="M10.5 8a3 3 0 1 0 0 6a3 3 0 0 0 0-6M9 11a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0M2 7.25A2.25 2.25 0 0 1 4.25 5h12.5A2.25 2.25 0 0 1 19 7.25v7.5A2.25 2.25 0 0 1 16.75 17H4.25A2.25 2.25 0 0 1 2 14.75zm2.25-.75a.75.75 0 0 0-.75.75V8h.75A.75.75 0 0 0 5 7.25V6.5zm-.75 6h.75a2.25 2.25 0 0 1 2.25 2.25v.75h8v-.75a2.25 2.25 0 0 1 2.25-2.25h.75v-3h-.75a2.25 2.25 0 0 1-2.25-2.25V6.5h-8v.75A2.25 2.25 0 0 1 4.25 9.5H3.5zm14-4.5v-.75a.75.75 0 0 0-.75-.75H16v.75c0 .414.336.75.75.75zm0 6h-.75a.75.75 0 0 0-.75.75v.75h.75a.75.75 0 0 0 .75-.75zm-14 .75c0 .414.336.75.75.75H5v-.75a.75.75 0 0 0-.75-.75H3.5zm.901 3.75A2.999 2.999 0 0 0 7 20h10.25A4.75 4.75 0 0 0 22 15.25V10a3 3 0 0 0-1.5-2.599v7.849a3.25 3.25 0 0 1-3.25 3.25z"/></svg>
                        <p class="ml-4 text-4xl font-black">S/. {{$requerimiento->monto}}</p>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <div class="flex items-center ml-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#000000" d="m19.03 7.39l1.42-1.42c-.45-.51-.9-.97-1.41-1.41L17.62 6c-1.55-1.26-3.5-2-5.62-2a9 9 0 0 0 0 18c5 0 9-4.03 9-9c0-2.12-.74-4.07-1.97-5.61M13 14h-2V7h2zm2-13H9v2h6z"/></svg>
                            <p class="text-lg ml-3">
                                {{$requerimiento->created_at->diffForHumans()}}
                            </p>
                        </div>
                        <div class="flex items-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#000000" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"/></svg>
                            <p class="text-lg ml-3">{{$requerimiento->ubicacion}}</p>
                        </div>
                    </div>
                    <div class="flex flex-row mt-4 gap-x-2">
                        <button type="button" wire:click="crearServicio({{$requerimiento->id}})" class="basis-1/2 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Aceptar</button>
                        <button type="button" wire:click="ofertar({{$requerimiento->id}})" class="basis-1/2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ofertar</button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <x-dialog-modal wire:model.live="modalOferta" class="p-0">
        <x-slot name="title">
            {{ __('Envia tu oferta') }}
        </x-slot>
        <x-slot name="content">
            @if (isset($oferta_actual))
                <p class="text-center text-base font-bold">
                    Oferta actual
                </p>
                <p class="text-center text-6xl">
                    S/. {{$oferta_actual}}
                </p>
            @endif
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" value="{{ __('Oferta') }}" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model="oferta" required />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button class="mx-3" wire:click="enviarOferta">
                {{__('Hacer oferta')}}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
