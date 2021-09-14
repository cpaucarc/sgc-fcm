<x-card>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="pr-4 flex-1">
                <h1 class="text-xl font-bold text-gray-800">
                    Lista de Empresas
                </h1>
                <p class="text-sm text-gray-400">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias aliquam at beatae
                    facilis fugit harum ipsam, iste itaque laborum libero numquam quis quos saepe soluta veritatis.
                    At, nam?
                </p>
            </div>
            @livewire('rrss.empresas.crear-empresa')
        </div>
    </x-slot>


    <x-alert/>

    {{--Buscador--}}
    <div class="flex justify-between items-center mb-4 text-gray-700">
        <div class="flex items-center">
            <span class="hidden lg:block">{{ __('Mostrar') }}</span>
            <select wire:model="cantidad" class="cursor-pointer input-form-none py-0">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span class="hidden lg:block">{{ __('empresas') }}</span>
        </div>

        <div class="flex items-center relative">
            <label for="search" class="px-3 py-1 text-gray-400">
                <x-icons.search :stroke="1.75" class="h-6 w-6"></x-icons.search>
            </label>
            <input type="text" id="search" wire:model="search"
                   class="input-form-b py-1">
            @if($search)
                <button wire:click="$set('search', '')"
                        class="px-2 absolute top-1 right-0 text-lg text-gray-500 hover:text-gray-600">
                    &times;
                </button>
            @endif
        </div>

    </div>

    @if($empresas->count())
        {{--Tabla--}}
        <x-table>
            <x-slot name="head">
                <tr>
                    <th scope="col" wire:click="sortBy('nombre')"
                        class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center justify-between">
                            <span>Empresa</span>
                            @if($sort === 'nombre')
                                <x-sort-by type="alpha" direction="{{$direction}}"/>
                            @endif
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('telefono')"
                        class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center justify-between">
                            <span> Telefono</span>
                            @if($sort === 'telefono')
                                <x-sort-by type="number" direction="{{$direction}}"/>
                            @endif
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('correo')"
                        class="cursor-pointer px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        <div class="flex items-center justify-between ">
                            <span>Correo</span>
                            @if($sort === 'correo')
                                <x-sort-by type="alpha" direction="{{$direction}}"/>
                            @endif
                        </div>
                    </th>
                    <th scope="col" wire:click="sortBy('ubicacion')"
                        class="hidden lg:block px-2 cursor-pointer py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        <div class="flex items-center justify-between ">
                            <span>Direccion</span>
                            @if($sort === 'direccion')
                                <x-sort-by type="alpha" direction="{{$direction}}"/>
                            @endif
                        </div>
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                        RRSS
                    </th>
                    <th scope="col" class="relative text-center px-4 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach($empresas as $empresa)
                    <tr>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="flex flex-col justify-center">
                                <div class="text-sm font-medium text-gray-900 tracking-wide">
                                    {{ $empresa->nombre }}
                                </div>
                                <div class="text-sm text-gray-400">
                                    RUC: {{ $empresa->ruc }}
                                </div>
                            </div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-700">
                                {{ $empresa->telefono }}
                            </div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-700">
                                {{ $empresa->correo }}
                            </div>
                        </td>
                        <td class="hidden lg:block px-2 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-700">
                                <div class="text-sm font-medium text-gray-900 tracking-wide">
                                    {{ $empresa->ubicacion }}
                                </div>
                                <div class="text-sm text-gray-400">
                                    {{ $empresa->direccion }}
                                </div>
                            </div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                            {{ $empresa->rrss->count() }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="abrirModal({{ $empresa }})"
                                    class="py-2 px-3 flex items-center rounded bg-transparent text-sm text-gray-500 hover:bg-blue-100 hover:text-blue-800">
                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                Editar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>

        @if( $empresas->hasPages() )
            <div class="py-3">
                {{ $empresas->links() }}
            </div>
        @endif
    @else
        <x-empty-search/>
    @endif

    {{--Modal--}}
    @if($empresa_seleccionada)
        <x-jet-dialog-modal wire:model="abrir" maxWidth="lg">

            <x-slot name="title">
                <h1 class="font-bold">Editar datos de la empresa </h1>
                <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                    <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                </button>
            </x-slot>

            <x-slot name="content">
                <div class="space-y-6">
                    <div class="grid grid-cols-3 flex-row items-center">
                        <x-jet-label for="nombre" class="flex items-center">
                            <svg class="h-6 w-6 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            {{ __('Razón Social') }}
                        </x-jet-label>
                        <div class="col-span-2">
                            <input type="text" id="nombre" wire:model="empresa_seleccionada.nombre"
                                   class="input-form w-full col-span-2" autofocus>
                            @error('empresa_seleccionada.nombre')
                            <x-jet-input-error for="empresa_seleccionada.nombre">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>

                    </div>
                    <div class="grid grid-cols-3 flex-row items-center">
                        <x-jet-label for="ruc" class="flex items-center">
                            <svg class="h-6 w-6 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                            </svg>
                            {{ __('RUC') }}
                        </x-jet-label>

                        <div class="col-span-2">
                            <input type="text" id="ruc" wire:model="empresa_seleccionada.ruc"
                                   class="input-form w-full col-span-2">
                            @error('empresa_seleccionada.ruc')
                            <x-jet-input-error for="empresa_seleccionada.ruc">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-3 flex-row items-center">
                        <x-jet-label for="telefono" class="flex items-center">
                            <svg class="h-6 w-6 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            {{ __('Telefono') }}
                        </x-jet-label>

                        <div class="col-span-2">
                            <input type="text" id="telefono" wire:model="empresa_seleccionada.telefono"
                                   class="input-form w-full col-span-2">
                            @error('empresa_seleccionada.telefono')
                            <x-jet-input-error for="empresa_seleccionada.telefono">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-3 flex-row items-center">
                        <x-jet-label for="correo" class="flex items-center">
                            <svg class="h-6 w-6 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ __('Correo Electrónico') }}
                        </x-jet-label>

                        <div class="col-span-2">
                            <input type="email" id="correo" wire:model="empresa_seleccionada.correo"
                                   class="input-form w-full col-span-2">
                            @error('empresa_seleccionada.correo')
                            <x-jet-input-error for="empresa_seleccionada.correo">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>

                    </div>
                    <div class="grid grid-cols-3 flex-row items-center">
                        <x-jet-label for="direccion" class="flex items-center">
                            <svg fill="currentColor" class="h-6 w-6 mr-1 text-gray-400" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            {{ __('Direccion') }}
                        </x-jet-label>

                        <div class="col-span-2">
                            <input type="text" id="direccion" wire:model="empresa_seleccionada.direccion"
                                   class="input-form w-full col-span-2 placeholder-gray-300"
                                   placeholder="Ejemplo: Av. Centenario N° 123">
                            @error('empresa_seleccionada.direccion')
                            <x-jet-input-error for="empresa_seleccionada.direccion">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-3 flex-row items-center">
                        <x-jet-label for="ubicacion" class="flex items-center">
                            <svg fill="currentColor" class="h-6 w-6 mr-1 text-gray-400" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            {{ __('Ubicacion') }}
                        </x-jet-label>


                        <div class="col-span-2">
                            <input type="text" id="ubicacion" wire:model="empresa_seleccionada.ubicacion"
                                   class="input-form w-full col-span-2 placeholder-gray-300"
                                   placeholder="Ejemplo: Huaraz - Ancash - Peru">
                            @error('empresa_seleccionada.ubicacion')
                            <x-jet-input-error for="empresa_seleccionada.ubicacion">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                    </div>
                </div>


            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('abrir', false)">
                    Cerrar
                </x-jet-secondary-button>

                <x-jet-button
                    wire:click="actualizarEmpresa"
                    wire:target="actualizarEmpresa"
                    wire:loading.class="bg-gray-800"
                    wire:loading.attr="disabled">
                    <svg wire:loading wire:target="actualizarEmpresa"
                         class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                         fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>
                            {{ __('Actualizar') }}
                        </span>
                </x-jet-button>

            </x-slot>
        </x-jet-dialog-modal>
    @endif

</x-card>
