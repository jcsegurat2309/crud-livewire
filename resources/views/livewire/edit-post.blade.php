<div>
    <a class="text-white cursor-pointer hover:text-green-600 hover:text-base" wire:click="$set('edit',true)">Modificar</a>
    <x-dialog-modal wire:model="edit">
        <x-slot name="title">
            <p class="text-white">Editar Post</p>
        </x-slot>

        <x-slot name="content">
            <div wire:loading wire:target="update" id="alert-border-2" class="p-4 mb-4 w-full text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-700 dark:border-red-800" role="alert">
                <div class="flex items-center ml-3 text-sm font-medium">
                    <i class="fa-solid fa-clock red-400 mr-2"></i>
                  Cargando...
                </div>
            </div>
            <div wire:loading wire:target="imagen" id="alert-border-2" class="p-4 mb-4 w-full text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-white dark:bg-gray-700 dark:border-white" role="alert">
                <div class="flex items-center ml-3 text-sm font-medium">
                    <i class="fa-solid fa-clock red-400 mr-2"></i>
                    <p class="block">Subiendo imagen...</p>
                </div>
                <div class="ml-3 text-sm font-medium">
                    <p>Esto dependera de tu conexión a internet o el tamaño de la img.</p>
                </div>
            </div>
            @if ($imagen)
                <center>
                    <img src="{{ $imagen->temporaryUrl() }}" width="50%" height="auto" class="mb-2 border border-white rounded-md">
                </center>
                @else
                    @if ($post->imagen)
                    <center>
                        <img src="{{ $post->imagen }}" width="50%" height="auto" class="mb-2 border border-white rounded-md">
                    </center>
            @endif
            @endif
            <div class="mb-2">
                <x-label value="Titulo del post"/>
                <x-input type="text" wire:model.debounce.2s="post.title" placeholder="Ingresa un titulo" maxlength="35" class="w-full mt-1"/>
                <x-input-error for="post.title" />
                
            </div>
            <div class="mb-2">
                <x-label value="Contenido del post"/>
                <textarea class="textarea" rows="6" wire:model.debounce.2s="post.content" placeholder="Ingresa el contenido del post"></textarea>
                <x-input-error for="post.content" />
                
            </div>
            <div class="mb-2">
                <input wire:model="imagen" type="file" accept="jpg,png,svg" id="{{ $id_imagen }}">
                <x-input-error for="imagen"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div wire:loading wire:target="update">
                <p class="text-white mt-2 mr-2">Cargando...</p>
            </div>
            <x-secondary-button wire:click="cerrar" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="update">
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
