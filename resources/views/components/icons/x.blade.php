@props(['stroke' => 2])

<svg {{ $attributes }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $stroke }}" d="M6 18L18 6M6 6l12 12"/>
</svg>