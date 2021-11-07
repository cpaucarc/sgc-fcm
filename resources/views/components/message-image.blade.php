<div class="grid place-items-center">

    <div class="flex gap-x-4 items-center">

        @if(isset($title) or isset($description))
            <div class="w-56">
                <h2 class="font-bold text-xl text-gray-600 leading-snug">
                    {{ $title }}
                </h2>
                <h3 class="text-gray-500 text-sm mt-3 leading-snug">
                    {{ $description }}
                </h3>
            </div>
        @endif

        @if(isset($image))
            <img class="w-48"
                 src="{{ $image }}"
                 alt="Imagen correspondiente">
        @endif

    </div>

</div>
