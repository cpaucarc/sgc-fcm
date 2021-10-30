@props(['odd' => false])

<tr class=" {{ $odd ? 'bg-gray-50' : 'bg-white' }} group text-sm bg-opacity-50 hover:bg-opacity-70 hover:bg-gray-100 text-gray-600 hover:text-gray-800 transition-all">
    {{ $slot }}
</tr>
