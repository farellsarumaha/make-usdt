@props([
    'value' => 'Default'
])

<label {{ $attributes->merge(['class' => 'text-sm font-medium']) }}>
    {{ $value ?? $slot }}
</label>
