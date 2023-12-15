<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <p class="max-w-lg text-3xl font-semibold leading-relaxed text-gray-900 dark:text-white">
            Unete a Nosotros
        </p>
        <div class="w-3/4 mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div>
                <h3 class="ml-1 mb-5 text-lg font-medium text-gray-900 dark:text-white">Selecciona los Servicios que ofreces:</h3>
                <form method="POST" action="{{ route('registro', auth()->user()->id) }}">
                    @csrf
                    <div class="flex flex-wrap">
                        @foreach (\App\Models\TipoServicio::all() as $servicio)
                            <div class="m-1.5">
                                <input type="checkbox" name="servicios[]" id="{{ $servicio->id }}" value="{{ $servicio->id }}" class="hidden peer">
                                <label for="{{ $servicio->id }}" class="inline-flex items-center justify-between w-full p-2.5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:text-white peer-checked:bg-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                    <div class="w-full text-sm font-semibold">
                                        {{ $servicio->nombre }}
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold text-green-600 transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-50 group">
                            <span class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-green-600 group-hover:h-full"></span>
                            <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </span>
                            <span class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </span>
                            <span class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">
                                Siguiente
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
