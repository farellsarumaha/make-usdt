@props([
    'value' => 'Default',
])

<label {{ $attributes->merge(['class' => 'text-sm font-medium text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
