<div>
    <div class="m-auto w-1/2 relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input wire:model.live='search' type="text" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Busca el servicio que necesites" required>   
    </div>
    <div class="mt-6 flex flex-wrap h-max">
        @if($servicios->isEmpty())
            <p class="mx-auto text-center text-sm text-gray-500">
                No se han encontrado resultados para "<span class="font-bold" x-text="$wire.search"></span>" 
            </p>
        @else
            @foreach ($servicios as $servicio)
                <button wire:click='mostrarServicio({{$servicio->id}})' type="button" class="py-2.5 px-5 m-1 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    {{$servicio->nombre}}
                </button>
            @endforeach
        @endif
    </div>
    @if (isset($tipo_servicio))
        <div class="container mt-6 mx-auto" x-show="$wire.servicioEstado" x-transition>
            <section class="rounded-lg bg-white dark:bg-gray-900">
                <div class="py-8 px-14 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
                    <div class="flex flex-col justify-center">
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                            {{$tipo_servicio->nombre}}
                        </h1>
                        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                            {{$tipo_servicio->descripcion}}
                            <br>
                            <b>Hay {{$cantidad}} personas que ofrecen este servicio!</b>
                        </p>
                        <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                            <a href="/servicio/{{Crypt::encrypt($tipo_servicio->id)}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Busqueda precisa
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div>
                        <p class="text-center rtl:text-center text-gray-500 dark:text-gray-400">
                            Ultimas personas en registrarse
                        </p>
                        @foreach ($tipos_servicio->colaboradores->take(-3)->reverse() as $colaborador)
                            <div class="shadow-2xl rounded-xxl w-3/4 mx-auto bg-blue-700 p-2.5 hover:bg-blue-500 my-3">
                                <div class="flex flex-row">
                                    <img class="m-1 rounded-full" style="width: 14%" src="https://th.bing.com/th/id/OIG.BvkqUNIavbVGWO7RsV_F?w=1024&h=1024&rs=1&pid=ImgDetMain" alt="image description">
                                    <div class="flex items-center p-2">
                                        <p class="text-lg font-bold text-white dark:text-white capitalize ">
                                            {{$colaborador->user->name}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    @endif
</div>
