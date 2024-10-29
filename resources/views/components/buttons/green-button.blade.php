@props([
    'name'
])

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'text-sm p-2 border border-green-200 bg-green-800 hover:bg-green-900 text-white rounded-lg flex justify-center items-center'
]) }}>
    {{ $name ?? $slot }}
</button>
