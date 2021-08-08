<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-1.5 bg-transparent font-medium text-sm text-gray-500 tracking-wide rounded hover:bg-gray-200 hover:text-gray-700 focus:outline-none active:text-gray-800 active:bg-gray-100 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>

{{--<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition']) }}>--}}
{{--    {{ $slot }}--}}
{{--</button>--}}
