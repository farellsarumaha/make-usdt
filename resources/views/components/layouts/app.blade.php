@props(['title' => 'Title Not Found'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('icon.ico') }}" type="image/x-icon">
    <title>{{ config('app.name') . ' - ' . $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <livewire:layouts.navbar-app />
    <main class="p-4 md:p-20">
        {{ $slot }}
    </main>
    @stack('script-chart') <!-- type="module" -->
</body>

</html>
