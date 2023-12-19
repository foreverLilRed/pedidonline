<div>

    <div class="grid grid-cols-4 gap-5">
        @foreach ($listaColaboradores as $colaborador)
            <div class="w-full max-w-sm bg-white border rounded-uxl shadow-lg dark:bg-gray-800 dark:border-gray-700 transition-transform duration-300 ease-in-out">
                <img class="rounded-uxl m-3 w-11/12 mx-auto" src="https://elements-video-cover-images-0.imgix.net/files/ddf31d2a-543c-4182-9ffa-d1a4f6d878ec/inline_image_preview.jpg?auto=compress%2Cformat&h=394&w=700&fit=min&s=104cee012a125e6a1aa53e475c8b8c7a" alt="image description">
                <div class="px-5 pb-5 mt-2">
                    <div class="flex justify-between">
                        <h5 class="text-xl capitalize font-semibold tracking-tight text-gray-900 dark:text-white">
                            @php
                                $name = $colaborador->user->name;
                                $array = explode(" ", $name);
                                $firstname = $array[0];
                                echo $firstname;
                            @endphp 
                        </h5>
                        <div class="flex items-center">
                            <h5 class="font-bold text-lg mt-0.5">
                                3.5
                            </h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#fdd868" d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275L5.825 22Z"/></svg>
                        </div>
                    </div>
                    <div class="flex flex-wrap mt-1.5">
                        @foreach ($colaborador->etiquetas->take(-3) as $etiqueta)
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                                {{$etiqueta->nombre}}
                            </span>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-between mt-3">
                        <a href="{{route('mostrar-colaborador',$colaborador->user->name)}}" class="relative inline-flex items-center justify-center p-2 px-3 py-1 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-green-500 rounded-full shadow-md group">
                            <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-green-500 group-hover:translate-x-0 ease">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none"><path stroke="#ffffff" stroke-width="2.5" d="M21 12a8.958 8.958 0 0 1-1.526 5.016A8.991 8.991 0 0 1 12 21a8.991 8.991 0 0 1-7.474-3.984A9 9 0 1 1 21 12Z"/><path fill="#ffffff" d="M12.75 9a.75.75 0 0 1-.75.75v2.5A3.25 3.25 0 0 0 15.25 9h-2.5Zm-.75.75a.75.75 0 0 1-.75-.75h-2.5A3.25 3.25 0 0 0 12 12.25v-2.5ZM11.25 9a.75.75 0 0 1 .75-.75v-2.5A3.25 3.25 0 0 0 8.75 9h2.5Zm.75-.75a.75.75 0 0 1 .75.75h2.5A3.25 3.25 0 0 0 12 5.75v2.5Zm-6.834 9.606L3.968 17.5l-.195.653l.444.517l.949-.814Zm13.668 0l.949.814l.444-.517l-.195-.653l-1.198.356ZM9 16.25h6v-2.5H9v2.5Zm0-2.5a5.252 5.252 0 0 0-5.032 3.75l2.396.713A2.752 2.752 0 0 1 9 16.25v-2.5Zm3 6a7.73 7.73 0 0 1-5.885-2.707L4.217 18.67A10.23 10.23 0 0 0 12 22.25v-2.5Zm3-3.5c1.244 0 2.298.827 2.636 1.963l2.396-.713A5.252 5.252 0 0 0 15 13.75v2.5Zm2.885.793A7.73 7.73 0 0 1 12 19.75v2.5a10.23 10.23 0 0 0 7.783-3.58l-1.898-1.627Z"/></g></svg>
                            </span>
                            <span class="absolute flex items-center justify-center w-full h-full text-green-500 transition-all duration-300 transform group-hover:translate-x-full ease">Perfil</span>
                            <span class="relative invisible">Button Text</span>
                        </a>
                        <a href="#_" class="relative inline-flex items-center justify-center p-2 px-3 py-1 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-blue-500 rounded-full shadow-md group">
                            <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-blue-500 group-hover:translate-x-0 ease">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ffffff" d="M2 22V4q0-.825.588-1.413T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.588 1.413T20 18H6l-4 4Zm4-8h8v-2H6v2Zm0-3h12V9H6v2Zm0-3h12V6H6v2Z"/></svg>
                            </span>
                            <span class="absolute flex items-center justify-center w-full h-full text-blue-500 transition-all duration-300 transform group-hover:translate-x-full ease">Contactar</span>
                            <span class="relative invisible">Button Text</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
