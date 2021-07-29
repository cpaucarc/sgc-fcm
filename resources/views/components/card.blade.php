<div class="bg-white border border-gray-200 pt-6 px-8 pb-2 rounded-md shadow-sm">

    @if(isset($header))
        <div class="mb-4">
            {{ $header }}
        </div>
    @endif

    {{ $slot }}

    @if(isset($footer))
        <div class="mt-4 bg-gray-100">
            {{ $footer }}
        </div>
    @endif

</div>
