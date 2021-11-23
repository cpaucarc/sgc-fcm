@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'text-sm bg-gray-900 text-white block px-3 py-2 rounded-md font-medium'
                : 'text-sm text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
