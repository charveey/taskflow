<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme.js'])
    </head>
    <body class="min-h-screen font-sans text-gray-900 antialiased dark:text-neutral-50 bg-gray-100 dark:bg-neutral-800">
        
        <header class="h-12 lg:h-16 px-3 lg:px-4 flex justify-between items-center bg-white dark:bg-neutral-900">
            <a href="/">
                <x-application-logo class="w-20" />
            </a>
            <x-theme-button />
        </header>

        <main>
            {{ $slot }}
        </main>
        
    </body>
</html>
