@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    @if(isset($title))
        <div class="px-6 pt-3 pb-4 text-lg flex justify-between items-center text-gray-800">
            {{ $title }}
        </div>
    @endif

    <div class="px-6 py-4">
        {{ $content }}
    </div>

    @if(isset($footer))
        <div class="px-6 py-3 border-t border-gray-200 bg-gray-50 flex justify-end items-center space-x-2">
            {{ $footer }}
        </div>
    @endif
</x-jet-modal>
