@props([
    'name',
    'request'
])

@php
    $getClasses = request()->routeIs($request) ? 'bg-gray-100' : ''
@endphp

<a {{ $attributes->merge(['class' => 'w-full hover:bg-gray-100 px-4 py-3 rounded-lg flex items-center gap-2 text-sm font-medium hover:text-blue-800 ' . $getClasses]) }} href="{{ route($request) }}">
    {{ $name ?? $slot }}
</a>
