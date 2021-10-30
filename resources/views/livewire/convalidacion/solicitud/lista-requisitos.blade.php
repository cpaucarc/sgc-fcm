<div class="space-y-6">
    @if ($requisitos->count())
        @foreach ($requisitos as $requisito)
            <div class="flex items-center">
                <span class="bg-red-200 text-red-600 mr-3 rounded-full p-1.5">
                    <x-icons.x :stroke="2" class="h-3 w-3"></x-icons.x>
                </span>
                {{ $requisito->nombre }}
            </div>
        @endforeach

        <div class="mt-4">
            <x-helper>
                La autoridad correspondiente responderá a su solicitud solo cuando usted haya enviado todos los
                requisitos.
            </x-helper>
        </div>
    @else
        <div class="flex items-center">
            <span class="bg-lime-200 text-lime-600 mr-2 rounded-full p-1">
                <x-icons.check :stroke="2" class="h-5 w-5"></x-icons.check>
            </span>
            <span>
                Ya presentó todos los requisitos.
            </span>
        </div>
    @endif

</div>
