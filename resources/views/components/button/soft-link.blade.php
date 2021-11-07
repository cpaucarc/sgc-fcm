@props(['color' => 'gray', 'size'])

@php
    $size = [
        'sm' => 'px-4 py-1.5 text-xs rounded font-medium',
        'normal' => 'px-4 py-2 text-sm rounded-md font-semibold',
        'lg' => 'px-5 py-2 text-lg rounded-lg',
    ][$size ?? 'normal'];
@endphp
<a {{ $attributes->merge(['class' => "group inline-flex items-center $size bg-$color-100 hover:bg-$color-200 text-$color-800 delay-75 duration-200 ease-in-out tracking-wide"]) }}>
    {{ $slot }}
</a>
