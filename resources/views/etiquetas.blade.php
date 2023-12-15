<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <p class="max-w-lg text-3xl font-semibold leading-relaxed text-gray-900 dark:text-white">
            Unete a Nosotros
        </p>
        <div class="w-3/4 mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div>
                <h3 class="ml-1 mb-5 text-lg font-medium text-gray-900 dark:text-white">Selecciona los Etiquetas con las que mas te identificas:</h3>
                <form method="POST" action="{{ route('registro-etiquetas', auth()->user()->id) }}">
                    @csrf
                    <div class="flex flex-wrap">
                        @foreach (\App\Models\Etiqueta::all() as $etiqueta)
                            <div class="m-1">
                                <input type="checkbox" name="etiquetas[]" id="{{ $etiqueta->id }}" value="{{ $etiqueta->id }}" class="hidden peer">
                                <label for="{{ $etiqueta->id }}" class="flex items-center bg-purple-100 text-purple-800 text-sm font-bold px-2.5 py-0.5 rounded-full peer-checked:text-white peer-checked:bg-purple-950 cursor-pointer dark:bg-purple-900 dark:text-purple-300 hover:bg-purple-300">                           
                                    <div class="w-full text-sm font-semibold">
                                        {{ $etiqueta->nombre }}
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold text-purple-600 transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-50 group">
                            <span class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-purple-600 group-hover:h-full"></span>
                            <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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
