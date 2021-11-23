<div>

    <div class="flex justify-between items-center mb-6">
        <x-input-dropdown wire:model="cantidad"></x-input-dropdown>
        <x-input-search wire:model.debounce.500ms="buscar"></x-input-search>
    </div>

    <div class="grid grid-cols-4 gap-6 mb-8 items-start">
        {{-- Nivel de Oficinas --}}
        <div class="col-span-4 lg:col-span-1 bg-purple-50 bg-opacity-60 rounded p-4">
            <h3 class="font-semibold text-gray-500 text-lg mb-4">Filtrar por niveles</h3>
            <div class="flex flex-wrap gap-x-6 gap-y-4">
                <label class="text-gray-700 text-sm flex items-top">
                    <input type="checkbox" wire:model="niveles_seleccionados" value="1"
                           class="rounded text-purple-600 focus:ring focus:ring-purple-600">
                    <span class="text-sm inline-block ml-2">Nivel General</span>
                </label>
                <label class="text-gray-700 text-sm flex items-top">
                    <input type="checkbox" wire:model="niveles_seleccionados" value="2"
                           class="rounded text-pink-600 focus:ring focus:ring-pink-600">
                    <span class="text-sm inline-block ml-2">Nivel de Facultad</span>
                </label>
                <label class="text-gray-700 text-sm flex items-top">
                    <input type="checkbox" wire:model="niveles_seleccionados" value="3"
                           class="rounded text-lime-600 focus:ring focus:ring-lime-600">
                    <span class="text-sm inline-block ml-2">Nivel de Escuela</span>
                </label>
            </div>
        </div>

        {{-- Roles --}}
        <div class="col-span-4 lg:col-span-3 bg-purple-50 bg-opacity-60 rounded p-4">
            <h3 class="font-semibold text-gray-500 text-lg mb-4">Filtrar por roles</h3>

            <div class="flex flex-wrap gap-x-6 gap-y-4">
                @foreach($entidades as $entidad)
                    <label class="text-gray-700 text-sm flex items-top">
                        <input type="checkbox" wire:model="entidades_seleccionados" value="{{ $entidad->id }}"
                               class="rounded">
                        <span class="text-sm inline-block ml-1">{{ $entidad->nombre }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>

    @if($usuarios->count())
        <x-table total="{{ $usuarios->total() }}">
            <x-slot name="head">
                <x-table.heading>DNI</x-table.heading>
                <x-table.heading>Nombres y apellidos</x-table.heading>
                <x-table.heading>Roles</x-table.heading>
                <x-table.heading>Fecha de creación</x-table.heading>
                <x-table.heading class="text-center">
                    <span class="sr-only">Acciones</span>
                </x-table.heading>
            </x-slot>
            <x-slot name="body">
                @foreach($usuarios as $usuario)
                    <x-table.row :odd="$loop->odd">
                        <x-table.cell>
                            {{ $usuario->persona->dni }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $usuario->persona->apellidos . ' '.$usuario->persona->nombres }}
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex flex-wrap gap-2">
                                @forelse($usuario->trabajo as $rol)

                                    <div
                                        class="px-4 py-2 bg-{{ $rol->oficina->nivel->id > 1 ? ($rol->oficina->nivel->id === 2 ? 'pink' : 'lime' ) : 'purple' }}-200 rounded text-gray-800">
                                        {{ $rol->entidad->nombre }}
                                    </div>

                                @empty
                                    <span>
                                        Ninguno,
                                    </span>
                                    <a class="text-blue-800 hover:text-blue-600 hover:underline"
                                       href="{{ route('admin.usuario', [sha1($usuario->id)]) }}">
                                        asignar rol
                                    </a>
                                @endforelse
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $usuario->created_at->diffForHumans() }}
                        </x-table.cell>
                        <x-table.cell class="whitespace-nowrap">
                            <x-button.group>
                                <x-button.invisible-link href="{{ route('admin.usuario', [sha1($usuario->id)]) }}">
                                    <x-icons.edit class="h-5" stroke="1.25"></x-icons.edit>
                                </x-button.invisible-link>
                                <x-button.invisible color="red"
                                                    wire:click="abrirModalEliminar({{ $usuario->id }}, '{{ $usuario->persona->apellidos . ' '. $usuario->persona->nombres }}')">
                                    <x-icons.delete class="h-5" stroke="1.25"></x-icons.delete>
                                </x-button.invisible>
                            </x-button.group>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        <div class="mt-4">
            {{ $usuarios->links() }}
        </div>
    @else
        <x-empty-search></x-empty-search>
    @endif

    <x-jet-confirmation-modal wire:model="abrirEliminar">
        <x-slot name="title">
            ¿Quiere eliminar al usuario?
        </x-slot>
        <x-slot name="content">
            <p class="text-gray-700 tracking-wide mt-4">
                El usuario <strong>{{ $nombreUsuario }}</strong> será eliminado de los registros.
                <br>
                Esta acción es irreversible, ¿Quiere continuar?
            </p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrirEliminar', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="eliminarUsuario">
                Eliminar Usuario
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('eliminado', msg => {
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: msg,
                });
            })
        </script>
    @endpush

</div>
