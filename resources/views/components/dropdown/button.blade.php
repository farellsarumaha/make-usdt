@props([
    'name' => $name
])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'w-full text-left text-sm font-medium hover:text-blue-800 px-4 py-2 hover:bg-stone-100 cursor-pointer']) }}>{{ $name }}</button>
