<div>
    <button 
        type="button"
        wire:click="$set('tipoModalStatus',true)"
        class="absolute top-0 end-0 p-2.5 h-full text-sm font-medium text-white bg-green-700 rounded-e-lg border border-green-700 hover:bg-green-800 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        <p>Agregar Tipo</p>
    </button>
    <x-dialog-modal wire:model.live="tipoModalStatus" class="p-0">
        <x-slot name="title">
            {{ __('Agregar Producto') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-3">
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <x-input wire:model="nombre" id="nombre" type="text" class="mt-1 w-full" autocomplete="nombre"/>
                <x-input-error for="nombre" class="mt-2" />
            </div>
            <div class="my-3">
                <x-label for="descripcion" value="{{ __('Descripcion') }}" />
                <x-input wire:model="descripcion" id="descripcion" type="text" class="mt-1 w-full" autocomplete="descripcion"/>
                <x-input-error for="descripcion" class="mt-2" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-action-message class="mr-3" on="tipo_guardado">
                {{ __('Guardado') }}
            </x-action-message>
            <x-secondary-button class="mx-3" wire:click="$set('tipoModalStatus',false)">
                {{__('Cancelar')}}
            </x-secondary-button>
            <x-button wire:click="saveTipo">
                {{__('Guardar')}}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>