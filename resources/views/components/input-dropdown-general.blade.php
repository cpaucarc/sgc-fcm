@props(['disabled' => false, 'label' => 'Mostrar:', 'bold' => false])

@php
    $extra_class = $bold ? 'font-bold' : '';
@endphp
<div class="cursor-pointer text-gray-600 bg-gray-50 rounded-lg px-4 py-1 flex items-center {{ $extra_class }}">
    <label>{{$label}}
        <select {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge(['class' => "input-form-none bg-transparent w-auto $extra_class"]) !!}>
            {{ $slot }}
        </select>
    </label>
</div>
