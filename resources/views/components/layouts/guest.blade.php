<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('icon.ico') }}" type="image/x-icon">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="p-4 md:p-20 min-h-screen flex flex-col justify-center items-center gap-4">
        <div class="flex flex-col items-center justify-between">
            <x-app-icon class="w-32" />
            <a href="{{ route('home') }}"
                class="font-extrabold text-4xl underline underline-offset-4">{{ config('app.name') }}</a>
        </div>
        <div class="p-4 shadow max-w-md w-full">
            {{ $slot }}
        </div>
        @livewire('wire-elements-modal')
    </main>
</body>

</html>
