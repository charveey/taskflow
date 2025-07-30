<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="transition-colors duration-200">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- logo -->
        <link rel="icon" href="{{ asset('logo.ico') }}" type="image/x-icon">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme.js', 'resources/js/nav.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen w-full flex bg-neutral-100 dark:bg-neutral-800">

            <!-- Navigation -->
            @include('layouts.navigation')

            <section class="w-full">
                <!-- Page Heading -->
                <x-header :header="$header" />

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </section>
        </div>
    </body>
</html>
