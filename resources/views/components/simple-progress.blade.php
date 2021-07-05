<div class="relative pt-1">
    <div class="flex mb-2 items-center justify-between">
        <div>
      <span class="text-xs font-semibold inline-block py-1 px-3 uppercase rounded-full text-gray-600 bg-gray-100">
        {{ $slot }}
      </span>
        </div>
        <div class="text-right">
      <span class="text-xs font-semibold inline-block text-blue-{{ $color }}">
        {{ $percent }}%
      </span>
        </div>
    </div>
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-100">
        <div style="width:{{ $percent }}%"
             class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-{{ $color }}"></div>
    </div>
</div>
