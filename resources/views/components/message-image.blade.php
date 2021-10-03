<div class="grid place-items-center">

    <div class="flex gap-x-6 items-center">

        <div class="w-56">
            <h2 class="font-bold text-xl text-gray-800 leading-5">
                {{ $title }}
            </h2>
            <h3 class="text-gray-600  mt-4">
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
