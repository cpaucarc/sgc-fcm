@props(['color' => 'gray'])

<button {{ $attributes->merge(['type' => 'button', 'class' => "group inline-flex items-center px-4 py-2 font-medium text-sm bg-$color-100 hover:bg-$color-200 text-$color-700 hover:text-$color-900 rounded delay-75 duration-200 ease-in-out tracking-wide"]) }}>
    {{ $slot }}
</button>

