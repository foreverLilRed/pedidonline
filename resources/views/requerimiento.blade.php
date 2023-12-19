<x-app-layout>
    <div class="py-8">
        <div class="w-1/3 shadow-2xl mx-auto bg-white py-5 rounded-xxl">
            <h3 class="text-4xl font-black text-center mt-3 mb-8">
                Describenos tu problema
            </h3>
            <form class="max-w-md mx-auto p-3" method="POST" action="/crear-requerimiento">
                @csrf
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Servicio</label>
                <select required name="servicio" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($servicios as $servicio)
                        <option id="{{$servicio->id}}" @if($id === $servicio->id) selected @endif value="{{$servicio->id}}"> {{$servicio->nombre}}</option>
                    @endforeach
                </select>

                <div class="relative z-0 w-full mb-5 group mt-5">
                    <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion:</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="#000000" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"/></svg>
                        </div>
                        <input name="direccion" type="text" id="direccion" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{auth()->user()->cliente->domicilio}}" required>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <label for="oferta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oferta:</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            S/.
                        </div>
                        <input name="oferta" required type="number" id="oferta" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="min S/10" pattern="^\d{5}(-\d{4})?$" required>
                    </div>
                </div>

                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Describe el problema</label>
                <textarea required name="descripcion" id="descripcion" rows="4" class="block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

                <button type="submit" class="mt-5 relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Solicitar servicio
                    </span>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>