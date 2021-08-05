<div class="bg-white border border-gray-200 rounded-md shadow-sm">

    @if(isset($header))
        <div class="px-6 py-4 border-b border-gray-200">
            {{ $header }}
        </div>
    @endif

    <div class="px-6 py-4">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-100">
            {{ $footer }}
        </div>
    @endif

</div>
