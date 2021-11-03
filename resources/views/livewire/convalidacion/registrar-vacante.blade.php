<div class="py-4">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-xl font-bold leading-6 text-gray-800">
                    Vacantes
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                    This information will be displayed publicly so be careful what you share.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2 space-y-4">
            <x-card>
                <div class="space-y-6">
                    <div class="flex justify-between items-center gap-x-8">
                        <div>
                            <x-jet-label for="vacantes">{{ __('Vacantes') }}</x-jet-label>
                            <input wire:model.defer="vacantes" type="number" id="vacantes"
                                class="input-form w-full col-span-2">
                            @error('vacantes')
                                <x-jet-input-error for="vacantes">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-jet-label for="ciclo">{{ __('Ciclo Académico') }}</x-jet-label>

                            <select wire:model="ciclo" id="ciclo" class="input-form w-full col-span-2">
                                <option value="0">Seleccione...</option>
                                @foreach ($ciclos as $ciclo)
                                    <option value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('ciclo')
                                <x-jet-input-error for="ciclo">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between items-center gap-x-8">
                        <div class="w-full">
                            <x-jet-label for="fechaInicio">{{ __('Fecha de Inicio') }}</x-jet-label>

                            <input wire:model.defer="fechaInicio" type="date" id="fechaInicio"
                                class="input-form w-full col-span-2">
                            @error('fechaInicio')
                                <x-jet-input-error for="fechaInicio">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-jet-label for="fechaFin">{{ __('Fecha de Final') }}</x-jet-label>

                            <input wire:model.defer="fechaFin" type="date" id="fechaFin"
                                class="input-form w-full col-span-2">
                            @error('fechaFin')
                                <x-jet-input-error for="fechaFin">{{ $message }}</x-jet-input-error>
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
                <div class="flex justify-end space-x-4">
                    <x-jet-button wire:click="registrarVACANTES" wire:target="registrarVACANTES"
                        wire:loading.class="bg-gray-800" wire:loading.attr="disabled">
                        <svg wire:loading wire:target="registrarVACANTES"
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
    </div>
</div>
