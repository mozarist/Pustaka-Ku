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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center font-[Geist] text-zinc-900 antialiased bg-zinc-100 min-h-screen">

    <div class="hidden md:block h-screen w-full p-5 px-5">
        <div
            class="flex flex-col justify-between gap-5 w-full h-full p-5 bg-gradient-to-t from-zinc-950 via-emerald-900 to-emerald-600 rounded-2xl">
            <p class="text-7xl max-w-2xl w-full text-white p-5">
                Pinjam dan baca buku lebih mudah di Pustaka-Ku!
            </p>

            <div class="flex gap-1 w-full">
                <img src="https://images.unsplash.com/photo-1604866830893-c13cafa515d5?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=687"
                    alt=""
                    class="w-1/4 aspect-square object-cover rounded-l-2xl grayscale hover:filter-none transition-all duration-300">

                <img src="https://images.unsplash.com/photo-1494809610410-160faaed4de0?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=688"
                    alt=""
                    class="w-1/4 aspect-square object-cover grayscale hover:filter-none transition-all duration-300">

                <img src="https://images.unsplash.com/photo-1600431521340-491eca880813?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1169"
                    alt=""
                    class="w-1/4 aspect-square object-cover rounded-r-2xl grayscale hover:filter-none transition-all duration-300">
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:justify-center items-center w-full px-5 pt-6 sm:pt-0 ">
        <div>
            <a href="/">
                <x-application-logo class="text-6xl 2xl:text-8xl h-16 2xl:h-32" />
            </a>
        </div>

        <div class="w-full max-w-lg py-4">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
