@props(['disabled' => false])
<div class="cursor-pointer text-gray-600 bg-gray-50 rounded-lg px-4 py-1 flex items-center">
    <label>Mostrar:
        <select {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge(['class' => 'input-form-none bg-transparent w-24']) !!}>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="9999">Todos</option>
        </select>
    </label>
</div>
