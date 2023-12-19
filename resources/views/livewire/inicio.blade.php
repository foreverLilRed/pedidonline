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
                        <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 gap-x-4">
                            <a href="/servicio/{{Crypt::encrypt($tipo_servicio->id)}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Ver colaboradores
                                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36 36"><circle cx="16.86" cy="9.73" r="6.46" fill="#ffffff"/><path fill="#ffffff" d="M21 28h7v1.4h-7z"/><path fill="#ffffff" d="M15 30v3a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1V23a1 1 0 0 0-1-1h-7v-1.47a1 1 0 0 0-2 0V22h-2v-3.58a32.12 32.12 0 0 0-5.14-.42a26 26 0 0 0-11 2.39a3.28 3.28 0 0 0-1.88 3V30Zm17 2H17v-8h7v.42a1 1 0 0 0 2 0V24h6Z"/></svg>
                            </a>
                            <a href="/requerimiento/{{Crypt::encrypt($tipo_servicio->id)}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900">
                                Solicitar servicio
                                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="m13.78 15.3l6 6l2.11-2.16l-6-6zm3.72-5.2c-.39 0-.81-.05-1.14-.19L4.97 21.25l-2.11-2.11l7.41-7.4L8.5 9.96l-.72.7l-1.45-1.41v2.86l-.7.7l-3.52-3.56l.7-.7h2.81l-1.4-1.41l3.56-3.56a2.976 2.976 0 0 1 4.22 0L9.89 5.74l1.41 1.4l-.71.71l1.79 1.78l1.82-1.88c-.14-.33-.2-.75-.2-1.12a3.49 3.49 0 0 1 3.5-3.52c.59 0 1.11.14 1.58.42L16.41 6.2l1.5 1.5l2.67-2.67c.28.47.42.97.42 1.6c0 1.92-1.55 3.47-3.5 3.47"/></svg>
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
