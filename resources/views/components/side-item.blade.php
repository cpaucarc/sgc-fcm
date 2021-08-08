@props(['active'])

@php
    $classes = $active ?? false ? 'bg-gray-200 w-10/12 inline-flex items-center px-3 py-3 border-b-2 lg:border-b-0 lg:border-l-4 border-red-500 font-bold text-sm leading-5 text-gray-700 focus:outline-none focus:border-red-700 transition rounded-t-lg lg:rounded-t-none lg:rounded-r-lg' : 'bg-transparent w-10/12 inline-flex items-center px-3 py-3 border-b-2 lg:border-b-0 lg:border-l-4 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($icon))
        <div class="mr-1">
            {{ $icon }}
        </div>
    @endif
    {{ $slot }}
</button>
