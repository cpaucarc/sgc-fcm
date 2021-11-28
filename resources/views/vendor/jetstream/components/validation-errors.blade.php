@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-semibold text-red-600">{{ __('¡Ups! Algo salió mal.') }}</div>

        <ul class="mt-2 mb-3 list-disc list-inside text-sm font-semibold text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
