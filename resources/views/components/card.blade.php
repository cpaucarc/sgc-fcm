<div
    {{ $attributes->merge(['class' => "bg-white border border-gray-200 rounded-md shadow-sm"]) }}>

    @if(isset($header))
        <div class="px-6 py-4 border-b border-gray-200 rounded-t-md">
            {{ $header }}
        </div>
    @endif

    <div class="px-6 py-4">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-md">
            {{ $footer }}
        </div>
    @endif

</div>
