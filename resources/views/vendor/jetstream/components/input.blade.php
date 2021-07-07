@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-300 focus:ring-3 focus:ring-blue-200 shadow-sm rounded']) !!}>
