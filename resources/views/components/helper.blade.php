@props(['color' => 'yellow'])

<div class="bg-{{ $color }}-100 px-4 py-3 flex items-start gap-x-4 rounded-lg">

    <x-icons.info class="flex-shrink-0 h-6 w-6 text-{{ $color }}-700"></x-icons.info>

    <p class="text-sm flex-1">
        {{ $slot }}
    </p>

</div>
