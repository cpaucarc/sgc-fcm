<button {{ $attributes->merge(['type' => 'button', 'class' => "group inline-flex items-center px-4 py-2 font-medium text-sm bg-white text-gray-500 hover:text-gray-800 rounded-md delay-75 duration-200 ease-in-out tracking-wide border border-gray-300 shadow-sm"]) }}>
    {{ $slot }}
</button>
