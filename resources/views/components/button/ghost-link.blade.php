@props(['size'])

@php
    $size = [
        'sm' => 'px-4 py-1.5 text-xs rounded font-medium',
        'normal' => 'px-4 py-2 text-sm rounded-md font-semibold',
        'lg' => 'px-5 py-2 text-lg rounded-lg',
    ][$size ?? 'normal'];
@endphp

<a {{ $attributes->merge(['class' => "group inline-flex items-center $size bg-white text-gray-500 hover:text-gray-800 rounded-md delay-75 duration-200 ease-in-out tracking-wide border border-gray-300 shadow-sm"]) }}>
    {{ $slot }}
</a>
