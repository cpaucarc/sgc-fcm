@props(['size'])

@php
    $size = [
        'sm' => 'px-4 py-1.5 text-xs rounded font-medium',
        'normal' => 'px-4 py-2 text-sm rounded-md font-semibold',
        'lg' => 'px-5 py-2 text-lg rounded-lg',
    ][$size ?? 'normal'];
@endphp

<a {{ $attributes->merge(['class' => "inline-flex $size items-center bg-blue-700 border text-white tracking-wide hover:bg-blue-800 active:bg-blue-800 focus:outline-none disabled:opacity-25 transition"]) }}>
    {{ $slot }}
</a>
