@props([
    'name' => $name,
    'request'
])

@php
    $getClasses = request()->routeIs($request) ? 'text-blue-800' : ''
@endphp

<a {{ $attributes->merge(['class' => 'text-sm font-medium hover:text-blue-800 ' . $getClasses]) }} href="{{ route($request) }}">
    {{ $name }}
</a>
