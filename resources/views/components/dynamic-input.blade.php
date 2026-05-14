@props([
    'field',
    'value' => null,
])

@php
    $name = $field['variable_name'] ?? '';
    $label = $field['label'] ?? str($name)->headline();
    $type = $field['type'] ?? 'text';
    $isRequired = (bool) ($field['is_required'] ?? false);
    $baseClass = 'w-full border border-white/10 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-600 focus:border-amber-200';
@endphp

<label class="block">
    <span class="mb-2 block text-xs font-semibold uppercase tracking-[0.22em] text-zinc-400">
        {{ $label }} @if($isRequired)<span class="text-amber-200">*</span>@endif
    </span>

    @switch($type)
        @case('number')
            <input name="payload[{{ $name }}]" type="number" value="{{ old('payload.' . $name, $value) }}" class="{{ $baseClass }}" @required($isRequired)>
            @break

        @case('date')
            <input name="payload[{{ $name }}]" type="date" value="{{ old('payload.' . $name, $value) }}" class="{{ $baseClass }}" @required($isRequired)>
            @break

        @case('select')
            <select name="payload[{{ $name }}]" class="{{ $baseClass }}" @required($isRequired)>
                <option value="">Choose {{ strtolower($label) }}</option>
                @foreach(($field['options'] ?? []) as $option)
                    <option value="{{ $option }}" @selected(old('payload.' . $name, $value) === $option)>{{ $option }}</option>
                @endforeach
            </select>
            @break

        @default
            <input name="payload[{{ $name }}]" type="text" value="{{ old('payload.' . $name, $value) }}" class="{{ $baseClass }}" @required($isRequired)>
    @endswitch

    @error('payload.' . $name)
        <span class="mt-2 block text-sm text-red-300">{{ $message }}</span>
    @enderror
</label>
