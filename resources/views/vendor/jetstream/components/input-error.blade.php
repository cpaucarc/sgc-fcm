@props(['for'])

@error($for)
<p {{ $attributes->merge(['class' => 'flex items-center text-sm text-red-600 font-semibold my-2']) }}>
    <x-icons.info class="h-5 w-5 text-red-600 mr-1" stroke="1.5"></x-icons.info>
    {{ $message }}
</p>
@enderror
