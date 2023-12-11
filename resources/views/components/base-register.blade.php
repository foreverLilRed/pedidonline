
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <p class="max-w-lg text-3xl font-semibold leading-relaxed text-gray-900 dark:text-white">
            Registrarme como
            {{ $contenido }}
        </p>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
