<button {{ $attributes->merge(['type' => 'button', 'class' => 'group inline-flex items-center px-3 py-1 font-medium text-sm tracking-wide rounded focus:outline-none transition']) }}>
    {{ $slot }}
</button>
