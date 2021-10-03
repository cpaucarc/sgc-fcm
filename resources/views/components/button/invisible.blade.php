@props(['color' => 'gray', 'size'])

@php
    $size = [
        'sm' => 'px-4 py-1.5 text-xs rounded font-medium',
        'normal' => 'px-4 py-2 text-sm rounded-md font-semibold',
        'lg' => 'px-5 py-2 text-lg rounded-lg',
    ][$size ?? 'normal'];
@endphp
<button {{ $attributes->merge(['type' => "button", 'class' => "group inline-flex items-center $size bg-transparent hover:bg-$color-100 text-gray-600 hover:text-$color-800 rounded duration-100 ease-in-out tracking-wide"]) }}>
    {{ $slot }}
</button>
