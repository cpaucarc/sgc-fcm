@props(['size'])

@php
    $size = [
        'sm' => 'px-4 py-1.5 text-xs font-medium',
        'normal' => 'px-4 py-2 text-sm font-semibold',
        'lg' => 'px-5 py-2 text-lg',
    ][$size ?? 'normal'];
@endphp

<a {{ $attributes->merge(['class' => "group inline-flex items-center $size hover:underline hover:text-blue-700"]) }}>
    {{ $slot }}
</a>
