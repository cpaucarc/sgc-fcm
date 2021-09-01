@props(['disabled' => false])
<div class="text-gray-600 bg-gray-50 rounded-lg px-4 py-1">
    <label for="input-dropdown-component-id-3180">Mostrar: </label>
    <select
        id="input-dropdown-component-id-3180" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input-form-none bg-transparent']) !!}>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="9999">Todos</option>
    </select>
</div>
