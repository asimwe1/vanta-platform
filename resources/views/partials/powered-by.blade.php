@props([
    'surface' => 'public',
])

@php
    $isFilament = $surface === 'filament';
@endphp

<div
    @if ($isFilament)
        style="padding: 1.25rem 1rem; text-align: center; color: #a1a1aa; font-size: 0.78rem;"
    @else
        class="text-xs text-zinc-500"
    @endif
>
    Powered by
    <a
        href="https://aphezis.com"
        target="_blank"
        rel="noopener noreferrer"
        @if ($isFilament)
            style="color: #fde68a; font-weight: 700; text-decoration: none;"
        @else
            class="font-semibold text-amber-200 transition hover:text-amber-100"
        @endif
    >ApheZis</a>
</div>
