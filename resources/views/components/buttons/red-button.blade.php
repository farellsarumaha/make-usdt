@props([
    'name'
])

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'text-sm p-2 border border-red-200 bg-red-800 hover:bg-red-900 text-white rounded-lg flex justify-center items-center'
]) }}>
    {{ $name ?? $slot }}
</button>
