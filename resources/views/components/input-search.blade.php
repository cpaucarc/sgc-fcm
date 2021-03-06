@props(['disabled' => false])

<div class="flex justify-between">
    <div class="px-4 py-1 bg-gray-100 bg-opacity-70 text-gray-700 rounded-lg flex items-center">
        <label for="input-search-component-id-147" class="mr-1 w-4 flex-shrink-0 text-gray-600">
            <x-icons.search :stroke="1.75" class="h-5 w-5"></x-icons.search>
        </label>
        <input id="input-search-component-id-147"
               type="text"
               placeholder="Buscar..."
               autocomplete="off"
            {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge(['class' => 'input-form-none bg-transparent rounded placeholder-gray-500']) !!}>
    </div>
</div>
