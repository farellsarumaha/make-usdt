@props(['value', 'color' => 'default'])

@php
$classDefault = 'p-2 border border-stone-200 rounded-lg flex justify-center items-center ';
@endphp

@switch($color)
@case('green')
<button {{ $attributes->merge(['type' => 'button', 'class' => $classDefault . 'text-white bg-green-900
    hover:bg-green-800']) }}>
    <span wire:loading.remove wire:target="{{ $attributes->wire('click')->value() }}">{{ $value ?? $slot }}</span>
    <span wire:loading wire:target="{{ $attributes->wire('click')->value() }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-gray-200 animate-spin fill-transparent">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
        </svg>
    </span>
</button>
@break

@case('red')
<button {{ $attributes->merge(['type' => 'button', 'class' => $classDefault . 'text-white bg-red-900 hover:bg-red-800'])
    }}>
    <span wire:loading.remove wire:target="{{ $attributes->wire('click')->value() }}">{{ $value ?? $slot }}</span>
    <span wire:loading wire:target="{{ $attributes->wire('click')->value() }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-gray-200 animate-spin fill-transparent">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
        </svg>
    </span>
</button>
@break

@case('blue')
<button {{ $attributes->merge(['type' => 'button', 'class' => $classDefault . 'text-white bg-blue-900
    hover:bg-blue-800']) }}>
    <span wire:loading.remove wire:target="{{ $attributes->wire('click')->value() }}">{{ $value ?? $slot }}</span>
    <span wire:loading wire:target="{{ $attributes->wire('click')->value() }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-gray-200 animate-spin fill-transparent">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
        </svg>
    </span>
</button>
@break

@default
<button {{ $attributes->merge(['type' => 'button', 'class' => $classDefault . 'hover:bg-stone-100']) }}>
    <span wire:loading.remove wire:target="{{ $attributes->wire('click')->value() }}">{{ $value ?? $slot }}</span>
    <span wire:loading wire:target="{{ $attributes->wire('click')->value() }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 text-gray-600 animate-spin fill-transparent">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
        </svg>
    </span>
</button>
@endswitch
