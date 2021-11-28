<div class="py-4">

    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-xl font-bold leading-6 text-gray-800">
                        Responsabilidad Social
                    </h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2 space-y-4">
                <x-card>
                    <div class="space-y-6">
                        <div>
                            <x-jet-label for="titulo">{{ __('Título') }}</x-jet-label>

                            <input wire:model.defer="titulo" type="text" id="titulo"
                                   class="input-form w-full col-span-2">
                            <x-jet-input-error for="titulo"></x-jet-input-error>
                        </div>
                        <div>
                            <x-jet-label for="descripcion">{{ __('Descripción') }}</x-jet-label>

                            <textarea wire:model.defer="descripcion" id="descripcion" rows="2"
                                      class="input-form w-full col-span-2"></textarea>
                            <x-jet-input-error for="descripcion"></x-jet-input-error>
                        </div>
                        <div>
                            <x-jet-label for="lugar">{{ __('Lugar') }}</x-jet-label>

                            <input wire:model.defer="lugar" type="text" id="lugar"
                                   class="input-form w-full col-span-2">
                            <x-jet-input-error for="lugar"></x-jet-input-error>
                        </div>
                        <div class="flex justify-between items-center gap-x-8">
                            <div class="w-full">
                                <x-jet-label for="fecha_inicio">{{ __('Fecha de Inicio') }}</x-jet-label>

                                <input wire:model.defer="fecha_inicio" type="date" id="fecha_inicio"
                                       class="input-form w-full col-span-2">
                                <x-jet-input-error for="fecha_inicio"></x-jet-input-error>
                            </div>
                            <div class="w-full">
                                <x-jet-label for="fecha_fin">{{ __('Fecha de Finalizacion') }}</x-jet-label>

                                <input wire:model.defer="fecha_fin" type="date" id="fecha_fin"
                                       class="input-form w-full col-span-2">
                                <x-jet-input-error for="fecha_fin"></x-jet-input-error>
                            </div>
                        </div>
                        <div>
                            <x-jet-label for="escuela">{{ __('Programa de estudio') }}</x-jet-label>
                            <select wire:model="escuela" id="escuela" class="input-form w-full col-span-2">
                                <option value="0">Seleccione...</option>
                                @foreach($escuelas as $esc)
                                    <option value="{{ $esc->id }}">{{$esc->nombre}}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="escuela"></x-jet-input-error>
                        </div>
                    </div>
                </x-card>
                <x-card>
                    <div>
                        <x-jet-label>{{ __('Empresa') }}</x-jet-label>
                        <div class="flex gap-x-2">
                            <div class="flex items-center flex-1 relative">
                                <div class="input-form py-2 bg-gray-50 w-full">
                                    @if($empresa)
                                        <span class="font-semibold tracking-wide">{{ $empresa->nombre }}</span>
                                    @else
                                        <span class="text-gray-400">{{__('No se ha escogido ninguno')}}</span>
                                    @endif
                                </div>

                                @if($empresa)
                                    <button wire:click="nullEmpresa"
                                            class="absolute right-3 mt-1 text-gray-500 hover:text-gray-700">
                                        <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                                    </button>
                                @endif

                            </div>
                            <x-jet-secondary-button class="flex-shrink" wire:click="$set('abrirEmpresa', 'true')">
                                <x-icons.open-modal class="h-5 w-5 mr-2"></x-icons.open-modal>
                                {{ __('Ver empresas') }}
                            </x-jet-secondary-button>
                        </div>
                        <x-jet-input-error for="empresa"></x-jet-input-error>
                    </div>
                    <x-slot name="footer">
                        <div class="group flex items-start gap-x-4 text-gray-500">
                            <x-icons.info class="h-10 w-10 -mt-1.5 group-hover:text-yellow-500"></x-icons.info>
                            <p class="text-sm">
                                Un proyecto de responsabilidad social no necesariamente se desarrollará en una empresa,
                                por lo que puede dejar este campo vacio.
                            </p>
                        </div>
                    </x-slot>
                </x-card>
                <x-card>
                    <div class="space-y-6">
                        <div>
                            <x-jet-label for="docente_responsable">{{ __('Docente Responsable') }}</x-jet-label>
                            <div class="flex gap-x-2">

                                <div class="flex items-center flex-1 relative">
                                    <div class="input-form py-2 bg-gray-50 w-full">
                                        @if($docente)
                                            <span class="font-semibold tracking-wide">
                                                {{ $docente->persona->apellidos }} {{ $docente->persona->nombres }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">{{__('No se ha escogido ninguno')}}</span>
                                        @endif
                                    </div>

                                    @if($docente)
                                        <button wire:click="nullDocente"
                                                class="absolute right-3 mt-1 text-gray-500 hover:text-gray-700">
                                            <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                                        </button>
                                    @endif
                                </div>

                                <x-jet-secondary-button class="flex-shrink" wire:click="abrirModalDocente">
                                    <x-icons.open-modal class="h-5 w-5 mr-2"></x-icons.open-modal>
                                    {{ __('Ver docentes') }}
                                </x-jet-secondary-button>
                            </div>
                            <x-jet-input-error for="docente_responsable"></x-jet-input-error>
                        </div>
                        <div>
                            <x-jet-label for="estudiante_responsable">{{ __('Estudiante Responsable') }}</x-jet-label>
                            <div class="flex gap-x-2">
                                <div class="flex items-center flex-1 relative">
                                    <div class="input-form py-2 bg-gray-50 w-full">
                                        @if($estudiante)
                                            <span class="font-semibold tracking-wide">
                                                {{ $estudiante->persona->apellidos }} {{ $estudiante->persona->nombres }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">{{__('No se ha escogido ninguno')}}</span>
                                        @endif
                                    </div>

                                    @if($estudiante)
                                        <button wire:click="nullEstudiante"
                                                class="absolute right-3 mt-1 text-gray-500 hover:text-gray-700">
                                            <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                                        </button>
                                    @endif
                                </div>

                                <x-jet-secondary-button class="flex-shrink" wire:click="abrirModalEstudiante">
                                    <x-icons.open-modal class="h-5 w-5 mr-2"></x-icons.open-modal>
                                    {{ __('Ver estudiantes') }}
                                </x-jet-secondary-button>
                            </div>
                            <x-jet-input-error for="estudiante_responsable"></x-jet-input-error>
                        </div>
                    </div>
                    <x-slot name="footer">
                        <div class="group flex items-start gap-x-4 text-gray-500">
                            <x-icons.info class="h-10 w-10 -mt-1.5 group-hover:text-yellow-500"></x-icons.info>
                            <p class="text-sm">
                                Puede agregar un docente responsable, un estudiante responsable o ambos, pero es
                                necesario que exista al menos uno de ellos.
                            </p>
                        </div>
                    </x-slot>
                </x-card>
                <x-card>
                    <div class="flex justify-end space-x-4">
                        <x-jet-button
                            wire:click="registrarRRSS"
                            wire:target="registrarRRSS"
                            wire:loading.class="bg-gray-800"
                            wire:loading.attr="disabled">
                            <x-icons.load wire:loading wire:target="registrarRRSS" class="h-4 w-4"></x-icons.load>
                            {{ __('Guardar') }}
                        </x-jet-button>
                    </div>
                </x-card>
            </div>


            <x-jet-dialog-modal wire:model="abrirEmpresa">
                <x-slot name="content">
                    @livewire('rrss.registro.modal-empresas')
                </x-slot>
            </x-jet-dialog-modal>

            <x-jet-dialog-modal wire:model="abrirDocente">
                <x-slot name="content">
                    @livewire('rrss.registro.modal-docentes')
                </x-slot>
            </x-jet-dialog-modal>

            <x-jet-dialog-modal wire:model="abrirEstudiante">
                <x-slot name="content">
                    @livewire('rrss.registro.modal-estudiantes')
                </x-slot>
            </x-jet-dialog-modal>

        </div>
    </div>
</div>
