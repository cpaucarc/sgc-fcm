<div class="py-4">
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-xl font-bold leading-6 text-gray-800">
                        Sustentación de Tesis
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
                            <x-jet-label for="numeroRegistro">{{ __('Número de registro') }}</x-jet-label>

                            <input wire:model.defer="numeroRegistro" type="text" id="numeroRegistro"
                                class="input-form w-full col-span-2" style="text-transform:uppercase;">
                            @error('numeroRegistro')
                                <x-jet-input-error for="numeroRegistro">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="titulo">{{ __('Título de la Tesis') }}</x-jet-label>

                            <textarea wire:model.defer="titulo" id="titulo" rows="2"
                                class="input-form w-full col-span-2"></textarea>
                            @error('titulo')
                                <x-jet-input-error for="titulo">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                        <div class="flex justify-between items-center gap-x-8">
                            <div class="w-full">
                                <x-jet-label for="tipoTesis">{{ __('Tipo de Tesis') }}</x-jet-label>

                                <select wire:model="tipoTesis" id="tipoTesis" class="input-form w-full col-span-2">
                                    <option value="0">Seleccione...</option>
                                    @foreach ($tiposTesis as $ttesis)
                                        <option value="{{ $ttesis->id }}">{{ $ttesis->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('tipoTesis')
                                    <x-jet-input-error for="tipoTesis">{{ $message }}</x-jet-input-error>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-jet-label for="anio">{{ __('Año de la Tesis') }}</x-jet-label>

                                <input wire:model.defer="anio" type="number" id="anio"
                                    class="input-form w-full col-span-2">
                                @error('anio')
                                    <x-jet-input-error for="anio">{{ $message }}</x-jet-input-error>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-between items-center gap-x-8">
                            <div class="w-full">
                                <x-jet-label for="fechaSustentacion">{{ __('Fecha de sustentación') }}</x-jet-label>

                                <input wire:model.defer="fechaSustentacion" type="date" id="fechaSustentacion"
                                    class="input-form w-full col-span-2">
                                @error('fechaSustentacion')
                                    <x-jet-input-error for="fechaSustentacion">{{ $message }}</x-jet-input-error>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-jet-label for="declaracion">{{ __('Declaración del jurado') }}</x-jet-label>

                                <select wire:model="declaracion" id="declaracion" class="input-form w-full col-span-2">
                                    <option value="0">Seleccione...</option>
                                    @foreach ($declaraciones as $declaracion)
                                        <option value="{{ $declaracion->id }}">{{ $declaracion->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('declaracion')
                                    <x-jet-input-error for="declaracion">{{ $message }}</x-jet-input-error>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <x-jet-label for="escuela">{{ __('Programa de estudio') }}</x-jet-label>

                            <select wire:model="escuela" id="escuela" class="input-form w-full col-span-2">
                                <option value="0">Seleccione...</option>
                                @foreach ($escuelas as $escuela)
                                    <option value="{{ $escuela->id }}">{{ $escuela->nombre }}</option>
                                @endforeach
                            </select>
                            @error('escuela')
                                <x-jet-input-error for="escuela">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                    </div>
                </x-card>
                <x-card>
                    <div class="space-y-6">
                        {{-- Docente Asesor --}}
                        <div>
                            <x-jet-label for="asesor">{{ __('Docente Asesor') }}</x-jet-label>
                            <div class="flex gap-x-2">

                                <div class="flex items-center flex-1 relative">
                                    <div class="input-form py-2 bg-gray-50 w-full">
                                        @if ($docenteAsesor)
                                            <span class="font-semibold tracking-wide">
                                                {{ $docenteAsesor->persona->apellidos }}
                                                {{ $docenteAsesor->persona->nombres }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">{{ __('No se ha escogido ninguno') }}</span>
                                        @endif
                                    </div>

                                    @if ($docenteAsesor)
                                        <button wire:click="nullDocenteAsesor"
                                            class="absolute right-3 mt-1 text-gray-500 hover:text-gray-700">
                                            <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                                        </button>
                                    @endif
                                </div>

                                <x-jet-secondary-button class="flex-shrink" wire:click="abrirModalDocenteAsesor">
                                    <svg fill="currentColor" class="h-5 w-5 mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                                    </svg>
                                    {{ __('Ver docentes') }}
                                </x-jet-secondary-button>
                            </div>
                            @error('asesor')
                                <x-jet-input-error for="asesor">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>

                    </div>
                    <x-slot name="footer">
                        <div class="group flex items-start gap-x-4 text-gray-500">
                            <svg class="h-10 w-10 -mt-1.5 group-hover:text-yellow-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm">
                                Es necesrio que agregue un docente como asesor. Para todo proyecto de investigación de
                                tesis es necesario asignar un docente asesor.
                            </p>
                        </div>
                    </x-slot>
                </x-card>
                <x-card>
                    <div class="space-y-6">
                        {{-- Estudiante Bachiller --}}
                        <div>
                            <x-jet-label for="bachiller">{{ __('Estudiante Bachiller') }}</x-jet-label>
                            <div class="flex gap-x-2">

                                <div class="flex items-center flex-1 relative">
                                    <div class="input-form py-2 bg-gray-50 w-full">
                                        @if ($estudianteBachiller)
                                            <span class="font-semibold tracking-wide">
                                                {{ $estudianteBachiller->estudiante->persona->apellidos }}
                                                {{ $estudianteBachiller->estudiante->persona->nombres }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">{{ __('No se ha escogido ninguno') }}</span>
                                        @endif
                                    </div>

                                    @if ($estudianteBachiller)
                                        <button wire:click="nullEstudianteBachiller"
                                            class="absolute right-3 mt-1 text-gray-500 hover:text-gray-700">
                                            <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                                        </button>
                                    @endif
                                </div>

                                <x-jet-secondary-button class="flex-shrink"
                                    wire:click="abrirModalEstudianteBachiller">
                                    <svg fill="currentColor" class="h-5 w-5 mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                                    </svg>
                                    {{ __('Ver bachiller') }}
                                </x-jet-secondary-button>
                            </div>
                            @error('bachiller')
                                <x-jet-input-error for="bachiller">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                        {{-- Docente Jurado --}}
                        <div>
                            <x-jet-label for="jurado">{{ __('Jurado Presidente') }}</x-jet-label>
                            <div class="flex gap-x-2">

                                <div class="flex items-center flex-1 relative">
                                    <div class="input-form py-2 bg-gray-50 w-full">
                                        @if ($docenteJurado)
                                            <span class="font-semibold tracking-wide">
                                                {{ $docenteJurado->persona->apellidos }}
                                                {{ $docenteJurado->persona->nombres }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">{{ __('No se ha escogido ninguno') }}</span>
                                        @endif
                                    </div>

                                    @if ($docenteJurado)
                                        <button wire:click="nullDocenteJurado"
                                            class="absolute right-3 mt-1 text-gray-500 hover:text-gray-700">
                                            <x-icons.x :stroke="1.5" class="h-5 w-5"></x-icons.x>
                                        </button>
                                    @endif
                                </div>

                                <x-jet-secondary-button class="flex-shrink" wire:click="abrirModalDocenteJurado">
                                    <svg fill="currentColor" class="h-5 w-5 mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                                    </svg>
                                    {{ __('Ver docentes') }}
                                </x-jet-secondary-button>
                            </div>
                            @error('jurado')
                                <x-jet-input-error for="jurado">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                    </div>
                    <x-slot name="footer">
                        <div class="group flex items-start gap-x-4 text-gray-500">
                            <svg class="h-10 w-10 -mt-1.5 group-hover:text-yellow-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm">
                                Puede agregar un bachiller, pero es
                                necesario que exista al menos uno, puede agregar un Jurado como presidente.
                            </p>
                        </div>
                    </x-slot>
                </x-card>
                <x-card>
                    <div class="flex justify-end space-x-4">
                        <x-jet-button wire:click="registrarTTPP" wire:target="registrarTTPP"
                            wire:loading.class="bg-gray-800" wire:loading.attr="disabled">
                            <svg wire:loading wire:target="registrarTTPP"
                                class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>
                                {{ __('Guardar') }}
                            </span>
                        </x-jet-button>
                    </div>
                </x-card>
            </div>
            <x-jet-dialog-modal wire:model="abrirDocenteAsesor">
                <x-slot name="content">
                    @livewire('ttpp.registro.modal-docente-asesor')
                </x-slot>
            </x-jet-dialog-modal>
            <x-jet-dialog-modal wire:model="abrirEstudianteBachiller">
                <x-slot name="content">
                    @livewire('ttpp.registro.modal-estudiantes-bachiller')
                </x-slot>
            </x-jet-dialog-modal>
            <x-jet-dialog-modal wire:model="abrirDocenteJurado">
                <x-slot name="content">
                    @livewire('ttpp.registro.modal-docentes-jurado')
                </x-slot>
            </x-jet-dialog-modal>
        </div>
    </div>
</div>
