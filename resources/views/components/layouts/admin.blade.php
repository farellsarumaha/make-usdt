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
    <livewire:layouts.navbar-admin />
    <livewire:layouts.sidebar-admin />
    <main class="p-4 pt-0 md:pr-9 md:p-20 md:ml-56 md:mt-12 mt-32">
        {{ $slot }}
    </main>
    @stack('script-chart') <!-- type="module" -->
</body>

</html>
