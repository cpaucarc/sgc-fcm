<div class="grid place-items-center">

    <div class="flex gap-x-6 items-center">

        <div class="w-56">
            <h2 class="font-bold text-xl text-gray-600 leading-relaxed">
                {{ $title }}
            </h2>
            <h3 class="text-gray-500 mt-4 leading-snug">
                {{ $description }}
            </h3>
        </div>

        @if(isset($image))
            <img class="w-48"
                 src="{{ $image }}"
                 alt="Imagen correspondiente">
        @endif

    </div>

</div>
