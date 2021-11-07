<div
    {{ $attributes->merge(['class' => "bg-white border border-gray-200 rounded-lg shadow-sm"]) }}>

    @if(isset($header))
        <div class="px-6 py-4 border-b border-gray-200 rounded-t-lg">
            {{ $header }}
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-lg">
            {{ $footer }}
        </div>
    @endif

</div>
