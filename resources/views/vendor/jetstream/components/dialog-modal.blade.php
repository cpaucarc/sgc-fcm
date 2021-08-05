@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-3 border-b border-gray-200 text-lg flex justify-between items-center text-gray-700">
        {{ $title }}
    </div>

    <div class="px-6 py-4">
        {{ $content }}
    </div>

    <div class="px-6 py-3 border-t border-gray-200 bg-gray-100 flex justify-end items-center space-x-2">
        {{ $footer }}
    </div>
</x-jet-modal>
