@props([
    'surface' => 'public',
])

@php
    $isFilament = $surface === 'filament';
@endphp

<div
    @if ($isFilament)
        style="padding: 0; text-align: left; color: #d4d4d8; font-size: 0.76rem; letter-spacing: 0;"
    @else
        class="text-xs text-zinc-400"
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
