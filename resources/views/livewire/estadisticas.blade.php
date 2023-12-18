<div wire:poll.5s>
    <div class="grid gap-4 grid-cols-3 capitalize my-3">
        <div class="rounded-uxl drop-shadow-2xl bg-white text-center hover:bg-black hover:text-white">
            <h1 class="mt-12 mb-4 text-3xl font-estadistica text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                {{$colaboradores}}
            </span></h1>
            <h4 class="mt-6 mb-2 font-estadistica text-xl">
                Colaboradores registrados
            </h1>
        </div>
        <div class="rounded-uxl drop-shadow-2xl bg-white text-center hover:bg-black hover:text-white">
            <h1 class="mt-12 mb-4 text-3xl font-estadistica text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                {{$clientes}}
            </span></h1>
            <h4 class="mt-6 mb-2 font-estadistica text-xl">
                Clientes registrados
            </h1>
        </div>
        <div class="rounded-uxl drop-shadow-2xl bg-white text-center hover:bg-black hover:text-white">
            <h1 class="mt-12 mb-4 text-3xl font-estadistica text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                @if (isset($servicios))
                    {{$servicios}}
                @else
                    0
                @endif
            </span></h1>
            <h4 class="mt-6 mb-2 font-estadistica text-xl">
                Servicios realizados
            </h1>
        </div>
    </div>
</div>
