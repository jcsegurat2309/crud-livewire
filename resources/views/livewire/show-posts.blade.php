<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
    <div class="flex items-center my-3">
        <x-input type="text" class="flex-1 mr-2" placeholder="Termino a busca" wire:model="search"/>
        <livewire:create-post />
    </div>
    <x-table>
        <x-slot name="head">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 text-white cursor-pointer flex" wire:click="column('id')">
                        Id
                        @if ($sort=='id')
                            @if ($direction=='desc')
                                <i class="fa-solid fa-arrow-down-z-a ml-2"></i>
                            @else
                                <i class="fa-solid fa-arrow-up-z-a ml-2"></i>
                            @endif
                        @else
                            <i class="fa-solid fa-sort float-right ml-3 inline"></i>                    
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3  text-white cursor-pointer" wire:click="column('title')">
                        Titulo
                        @if ($sort=='title')
                            @if ($direction=='desc')
                                <i class="fa-solid fa-arrow-down-z-a ml-2 inline"></i>
                            @else
                                <i class="fa-solid fa-arrow-up-z-a ml-2 inline"></i>
                            @endif
                        @else
                            <i class="fa-solid fa-sort float-right ml-3 inline"></i>                    
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 text-white cursor-pointer" wire:click="column('content')">
                        Contenido
                        @if ($sort=='content')
                            @if ($direction=='desc')
                                <i class="fa-solid fa-arrow-down-z-a ml-2"></i>
                            @else
                                <i class="fa-solid fa-arrow-up-z-a ml-2"></i>
                            @endif
                        @else
                            <i class="fa-solid fa-sort float-right ml-3 inline"></i>                    
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 text-white">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3 text-white">
                        Acción
                    </th>
                </tr>
            </thead>
        </x-slot>
        <x-slot name="body">
            @if ($posts->count())
                @foreach ($posts as $p)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium">
                            {{ $p->id }}
                        </td>
                        <th  class="px-6 py-4 text-white">
                            {{ $p->title }}
                        </th>
                        <td class="px-6 py-4 text-white">
                            {{ $p->content }}
                        </td>
                        <td  class="px-6 py-4 object-cover w-32 h-auto">
                            <img src="{{ $p->imagen }}"> 
                        </td>
                        <td class="px-6 py-4">
                            <a class="text-white" href="#">Eliminar</a>
                            <a class="text-white" href="#">Modificar</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="text-white px-6 py-4" colspan="5">Sin registros coincidentes</td>
                </tr>
            @endif
        </x-slot>
    </x-table>
</div>
