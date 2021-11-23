<div>
    <div class="mb-4">
        <x-button.primary wire:click="$set('abrir', true)">
            <x-icons.plus class="w-4 h-5 mr-1"></x-icons.plus>
            Asignar nuevo rol
        </x-button.primary>
    </div>

    <x-dd>
        {{ $roles_faltantes }}
    </x-dd>

    <x-table>
        <x-slot name="head">
            <x-table.heading>N°</x-table.heading>
            <x-table.heading>Roles</x-table.heading>
            <x-table.heading>Acciones</x-table.heading>
        </x-slot>
        <x-slot name="body">
            @foreach($usuario_actual->trabajo as $i => $rol)
                <x-table.row :odd="$loop->odd">
                    <x-table.cell>
                        {{ ($i + 1) }}
                    </x-table.cell>
                    <x-table.cell>
                        <div>
                            {{ $rol->entidad->nombre }}
                            <br>
                            <small>
                                @if($rol->oficina->facultad)
                                    @if($rol->oficina->escuela)
                                        {{ $rol->oficina->escuela->nombre }} -
                                    @endif
                                    {{ $rol->oficina->facultad->nombre }}
                                @else
                                    {{ __('Nivel General') }}
                                @endif
                            </small>
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <x-button.invisible
                            wire:click="abrirModalEliminar({{ $rol->id }}, '{{ $rol->entidad->nombre }}')">
                            <x-icons.delete class="h-5 w-5" stroke="1.25" color="red"></x-icons.delete>
                        </x-button.invisible>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>

    <x-jet-dialog-modal wire:model="abrir">

        <x-slot name="title">
            <h1 class="font-bold"> Asignar un nuevo rol a este usuario </h1>
            <button wire:click="$set('abrir', false)" class="text-gray-400 hover:text-gray-500">
                <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
            </button>
        </x-slot>

        <x-slot name="content">

            <div class="mb-4 bg-gray-50 p-4 rounded">
                <x-jet-label>Entidad</x-jet-label>
                <select class="input-form w-full" wire:model="role_seleccionada">
                    @foreach($roles_faltantes as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 bg-blue-50 p-4 rounded space-y-4">
                <div>
                    <x-jet-label>Nivel de Oficina</x-jet-label>
                    <select class="input-form w-full" wire:model="nivel_seleccionado">
                        <option value="1">Nivel General</option>
                        <option value="2">Nivel de Facultad</option>
                        <option value="3">Nivel de Escuela</option>
                    </select>
                </div>
                @if($mostrar_combo)
                    <div>
                        <x-jet-label>Pertenencia de la Oficina</x-jet-label>
                        <select class="input-form w-full" wire:model="oficina_seleccionado">
                            <option value="0">Seleccione...</option>
                            @foreach($oficinas as $oficina)
                                <option value="{{ $oficina->id }}">
                                    @if($oficina->escuela)
                                        {{ $oficina->escuela->nombre }} -
                                    @endif
                                    {{ $oficina->facultad->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>


        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button
                wire:click="asignarRol"
                wire:target="asignarRol"
                wire:loading.class="bg-gray-800"
                wire:loading.attr="disabled">
                <svg wire:loading wire:target="asignarRol"
                     class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                     fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>
                                {{ __('Asignar rol') }}
                            </span>
            </x-jet-button>

        </x-slot>
    </x-jet-dialog-modal>

    {{--    <x-jet-confirmation-modal wire:model="abrirEliminar">--}}
    {{--        <x-slot name="title">--}}
    {{--            ¿Quiere quitar el rol {{ $rolEliminar }}?--}}
    {{--        </x-slot>--}}
    {{--        <x-slot name="content">--}}
    {{--            <p class="text-gray-700 tracking-wide mt-4">--}}
    {{--                <strong><i>'{{ $rolEliminar }}'</i></strong> se eliminará de los roles del usuario.--}}
    {{--                <br>--}}
    {{--                ¿Quiere continuar?--}}
    {{--            </p>--}}
    {{--        </x-slot>--}}
    {{--        <x-slot name="footer">--}}
    {{--            <x-jet-secondary-button wire:click="$set('abrirEliminar', false)">--}}
    {{--                Cancelar--}}
    {{--            </x-jet-secondary-button>--}}
    {{--            <x-jet-danger-button wire:click="quitarRol">--}}
    {{--                Quitar rol--}}
    {{--            </x-jet-danger-button>--}}
    {{--        </x-slot>--}}
    {{--    </x-jet-confirmation-modal>--}}

</div>
