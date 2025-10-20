<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-[#FDFDFC] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <h5 class="bg-gradient-to-tr from-green-600 to-emerald-600 inline-block bg-clip-text text-transparent text-8xl font-semibold">
            Maaf!
        </h5>
        <p class="text-2xl mt-2">
            Anda tidak memiliki izin untuk mengakses halaman ini!
        </p>

        <p class="mt-5 text-3xl font-mono font-semibold">
            403 Forbidden
        </p>

        <button onclick="history.back()" class="mt-5 px-8 py-1 bg-gradient-to-tr from-zinc-950 to-emerald-600 text-white font-semibold rounded-md hover:brightness-110 hover:scale-105 transition">
            Kembali
        </button>
    </body>
</html>
