@props(['disabled' => false])

<div class="flex justify-between">
    <div class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg flex items-center">
        <label for="input-search-component-id-147" class="mr-2">
            <x-icons.search :stroke="1.75" class="h-5 w-5"></x-icons.search>
        </label>
        <input id="input-search-component-id-147" type="text" placeholder=" Buscar..."
            {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input-form-none bg-gray-100 placeholder-gray-400']) !!}>
    </div>
</div>
