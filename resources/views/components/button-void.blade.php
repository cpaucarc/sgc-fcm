<button {{ $attributes->merge(['type' => 'button', 'class' => "group inline-flex items-center px-3 py-1.5 bg-white text-gray-600 hover:text-gray-800 rounded-md delay-75 duration-200 ease-in-out font-medium tracking-wide border border-gray-300 shadow-sm"]) }}>
    {{ $slot }}
</button>
