@props([
    'name'
])

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'text-sm p-2 border border-stone-200 hover:bg-stone-100 rounded-lg flex justify-center items-center'
]) }}>
    {{ $name ?? $slot }}
</button>
