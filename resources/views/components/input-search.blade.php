@props(['disabled' => false])

<div class="flex justify-between">
    <div class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg flex items-center">
        <label for="input-search-component-id-147" class="mr-2">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </label>
        <input id="input-search-component-id-147" type="text" placeholder=" Buscar..."
            {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input-form-none bg-gray-100 placeholder-gray-400']) !!}>
    </div>
</div>
