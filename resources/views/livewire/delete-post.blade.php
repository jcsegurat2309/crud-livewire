<div>
    <a class="text-white cursor-pointer hover:font-extrabold hover:text-base hover:text-red-600" wire:click="$set('delete',true)">Eliminar</a>

    <x-dialog-modal wire:model="delete">
        <x-slot name="title">
            <div class="flex items-center">
                <i class="fa-solid fa-triangle-exclamation" style="color: #f20000;"></i>
                <p class="ml-2">Eliminar Post: {{ $post->title }}</p>
            </div>
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="del" id="alert-border-2" class="p-4 mb-4 w-full text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-700 dark:border-red-800" role="alert">
                <div class="flex items-center ml-3 text-sm font-medium">
                    <i class="fa-solid fa-clock red-400 mr-2"></i>
                  Cargando...
                </div>
            </div>
            <p class="text-white text-base">Esta acción es irreversible, al dar clic en aceptar sé eliminar el registro y la imagen de forma permanente</p>
        </x-slot>
        <x-slot name="footer">
            <div wire:loading wire:target="del" class="flex items-center">
                <p>Cargando...</p>
            </div>
            <x-secondary-button class="ml-2 mr-2" wire:click="$set('delete',false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="del">
                Aceptar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
