<button {{ $attributes->merge(['type' => 'button', 'class' => "group inline-flex items-center px-3 py-1.5 bg-transparent hover:bg-gray-50 text-gray-600 hover:text-gray-700 rounded-md delay-75 duration-200 ease-in-out font-medium tracking-wide border border-gray-300 shadow-sm"]) }}>
    {{ $slot }}
</button>
