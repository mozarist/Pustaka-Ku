<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-[Geist] antialiased">
    <div class="flex flex-col items-center justify-between min-h-screen bg-zinc-100 text-zinc-950">
        @include('layouts.navigation')

        @if (request()->is('/'))
            <div class="w-full px-4 pt-20 pb-5">
                @include('layouts.hero')
            </div>
        @endif

        <!-- Page Content -->
        <main
            class="max-w-7xl w-full px-4 sm:px-6 lg:px-8 py-24 @if (request()->is('/')) pt-5 md:pt-12 space-y-32 @else sm:py-24 sm:space-y-10 @endif">
            {{ $slot }}
        </main>

        @include('layouts.footer')
    </div>
</body>

</html>
