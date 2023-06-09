<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
    <div>
        <x-input type="text" class="w-full my-4" placeholder="Termino a busca" wire:model="search"/>
    </div>
    <x-table>
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
                <th scope="col" class="px-6 py-3 text-white cursor-pointer" wire:click="column('title')">
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
       @if ($posts->count())
            @foreach ($posts as $p)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        {{ $p->id }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-pre-line dark:text-white">
                        {{ $p->title }}
                    </th>
                    <td class="px-6 py-4 flex break-words">
                        {{ $p->content }}
                    </td>
                    <td class="px-6 py-4">
                        <img src="https://proximahost.es/blog/wp-content/uploads/2022/05/Laravel.jpg">
                    </td>
                    <td class="px-6 py-4">
                        <a href="#">Eliminar</a>
                        <a href="#">Modificar</a>
                    </td>
                </tr>
            @endforeach
       @else
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="text-white px-6 py-4" colspan="5">Sin registros coincidentes</td>
            </tr>
       @endif
    </x-table>
</div>
