<div class="space-y-8 my-6 border border-gray-300 p-6">

    {{-- Instrucciones --}}
    <div class="text-gray-500">
        <h2 class="font-bold text-gray-700">
            Instrucciones
        </h2>
        <p class="text-sm">
            Esta encuesta exige VERACIDAD y HONESTIDAD en las respuestas, las mismas nos permitirán evaluar el
            desempeño de la Responsabilidad Social Universitaria. <br>
        </p>
    </div>

    <hr>

    {{-- Nombres y Correo --}}
    <div class="grid grid-cols-2 gap-x-4">
        <div class="col-span-2 lg:col-span-1 mt-2">
            <x-jet-label for="nombre">Nombre</x-jet-label>
            <input type="text" id="nombre" wire:model="nombre" class="input-form w-full placeholder-gray-300"
                   placeholder="Ej. Juan Alvarado Cadillo">
            @error('nombre') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="col-span-2 lg:col-span-1 mt-2">
            <x-jet-label for="correo">Correo Electrónico</x-jet-label>
            <input type="email" id="correo" wire:model="correo" class="input-form w-full placeholder-gray-300"
                   placeholder="Ej. juan@gmail.com">
            @error('correo') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <hr>

    {{-- Tabla --}}
    <div class="space-y-4">
        {{-- Leyenda --}}
        <div
            class="flex justify-between items-center text-xs text-gray-600 bg-gray-100 border border-gray-300 px-4 py-2 rounded">
            <span>1: Nada satisfecho</span>
            <span>2: Poco satisfecho</span>
            <span>3: Neutral</span>
            <span>4: Muy satisfecho</span>
            <span>5: Totalmente satisfecho</span>
        </div>
        {{-- Tabla --}}
        <div class="overflow-hidden">
            <x-table>
                <x-slot name="head">
                    <tr class="text-xs text-gray-500 text-left tracking-wide">
                        <th scope="col" rowspan="2"
                            class="pl-4 pr-1 pt-2 pb-0 font-light uppercase flex-shrink-0 w-12">
                            N°
                        </th>
                        <th scope="col" rowspan="2"
                            class="pl-0 pr-4 pt-2 pb-0 font-light uppercase flex-1">
                            Pregunta
                        </th>
                        <th scope="col" colspan="5"
                            class="px-0 pt-2 pb-0 text-sm font-light text-center">
                            Valoración
                        </th>
                    </tr>
                    <tr class="text-xs text-gray-500 text-left tracking-wide border-b border-gray-300">
                        <th scope="col"
                            class="px-0 pt-1 pb-2 font-light text-center">
                            1
                        </th>
                        <th scope="col"
                            class="px-0 pt-1 pb-2 font-light text-center">
                            2
                        </th>
                        <th scope="col"
                            class="px-0 pt-1 pb-2 font-light text-center">
                            3
                        </th>
                        <th scope="col"
                            class="px-0 pt-1 pb-2 font-light text-center">
                            4
                        </th>
                        <th scope="col"
                            class="pl-0 pr-1 pt-1 pb-2 font-light text-center">
                            5
                        </th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach ($preguntas as $i => $pregunta)
                        @livewire('encuesta.calificacion',
                        ['encuesta' => $encuesta, 'i' => ($i+1), 'pregunta' => $pregunta], key($i))
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    </div>

    <div class="flex justify-end">
        <x-jet-button wire:click="guardarEncuesta">
            <svg wire:loading wire:target="guardarEncuesta"
                 class="animate-spin h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Enviar respuestas
        </x-jet-button>
    </div>

</div>
