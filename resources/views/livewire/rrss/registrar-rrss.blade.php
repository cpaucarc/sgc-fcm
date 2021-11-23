<div class="py-4">

    <x-dd>
        {{ Auth::user()->trabajo }}
    </x-dd>

    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-xl font-bold leading-6 text-gray-800">
                        Responsabilidad Social
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        This information will be displayed publicly so be careful what you share.
                    </p>
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
                                <svg fill="currentColor" class="h-5 w-5 mr-2" viewBox="0 0 16 16">
                                    <path
                                        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                </svg>
                                {{ __('Ver empresas') }}
                            </x-jet-secondary-button>
                        </div>
                        <x-jet-input-error for="empresa"></x-jet-input-error>
                    </div>
                    <x-slot name="footer">
                        <div class="group flex items-start gap-x-4 text-gray-500">
                            <svg class="h-10 w-10 -mt-1.5 group-hover:text-yellow-500" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
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
                                    <svg fill="currentColor" class="h-5 w-5 mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                    </svg>
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
                                    <svg fill="currentColor" class="h-5 w-5 mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                    </svg>

                                    {{ __('Ver estudiantes') }}
                                </x-jet-secondary-button>
                            </div>
                            <x-jet-input-error for="estudiante_responsable"></x-jet-input-error>
                        </div>
                    </div>
                    <x-slot name="footer">
                        <div class="group flex items-start gap-x-4 text-gray-500">
                            <svg class="h-10 w-10 -mt-1.5 group-hover:text-yellow-500" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
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
                            <svg wire:loading wire:target="registrarRRSS"
                                 class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                                 fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>
                                {{ __('Guardar') }}
                            </span>
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
