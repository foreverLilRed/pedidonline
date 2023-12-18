<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row gap-x-8">
                <div class="basis-1/3 flex items-center">
                    <div>
                        <img class="rounded-full" src="https://elements-video-cover-images-0.imgix.net/files/ddf31d2a-543c-4182-9ffa-d1a4f6d878ec/inline_image_preview.jpg?auto=compress%2Cformat&h=394&w=700&fit=min&s=104cee012a125e6a1aa53e475c8b8c7a" alt="image description">
                    </div>
                </div>
                <div class="basis-3/4">
                    <div class="flex items-center">
                        <div>
                            <h1 class="uppercase text-8xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{$colaborador->user->name}}<span class="text-blue-600 dark:text-blue-500"></span></h1>
                        </div>
                        <div class="bg-blue-300 rounded-lg ml-3 px-1.5">
                            <div class="flex items-center">
                                <div>
                                    <h5 class="font-black text-4xl">
                                        3.5
                                    </h5>
                                </div>
                                <div class="mb-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="#fdd868" d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275L5.825 22Z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        @foreach ($colaborador->etiquetas as $etiqueta)
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                                {{$etiqueta->nombre}}
                            </span>
                        @endforeach
                    </div>
                    <h3 class="mt-3 font-bold">Servicios que ofrece:</h3>
                    <div class="flex flex-wrap">
                        @foreach ($colaborador->servicios as $servicio)
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium m-1 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                            {{$servicio->nombre}}
                        </span>
                        @endforeach
                    </div>
                    <span class="mt-4 bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                        </svg>
                        {{$tiempo}} dias de servicio
                    </span>
                </div>
            </div>
        
        </div>
    </div>
</x-app-layout>
