@props(['on'])

<div x-data="{ shown: false, timeout: null }"
     x-init="
        @this.on('{{ $on }}', () => {
            clearTimeout(timeout);
            shown = true;
            timeout = setTimeout(() => {
                shown = false
            }, 4000);
        })"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     style="display: none;"
    {{ $attributes->merge(['class' => 'text-sm text-gray-600 border p-4 bg-blue-300 absolute sticky right-0 top-0']) }}>

    {{ $slot->isEmpty() ? 'Saved.' : $slot }}

</div>
