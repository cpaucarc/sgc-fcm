<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'group inline-flex items-center px-4 py-2 font-medium text-sm tracking-wide rounded focus:outline-none transition']) }}>
    {{ $slot }}
</button>
