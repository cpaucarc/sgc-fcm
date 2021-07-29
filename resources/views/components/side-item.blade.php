@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-2 py-2 border-l-2 border-red-500 font-bold text-sm leading-5 text-gray-700 focus:outline-none focus:border-red-700 transition'
                : 'inline-flex items-center px-2 py-2 border-l-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
