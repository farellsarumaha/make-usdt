@props([
    'value',
    'active'
])

<a {{ $attributes->merge(['class' => 'text-sm font-medium hover:text-blue-800']) }} wire:navigate>
    {{ $value ?? $slot }}
</a>
