@props([
    'name'
])

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'text-sm p-2 border border-blue-200 bg-blue-800 hover:bg-blue-900 text-white rounded-lg flex justify-center items-center'
]) }}>
    {{ $name ?? $slot }}
</button>
