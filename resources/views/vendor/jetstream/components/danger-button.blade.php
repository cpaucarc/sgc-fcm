<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-rose-600 border border-transparent rounded font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-700 focus:outline-none focus:border-rose-700 focus:ring focus:ring-rose-200 active:bg-rose-600 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
