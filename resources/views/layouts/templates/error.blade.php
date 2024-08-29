<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- TailWind CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .v{
            border: 1px solid red;
        }
    </style>

</head>

<body class="font-sans antialiased flex justify-center">

    <section class="flex flex-col justify-center h-dvh">
        <section class="h-16 w-full flex justify-center">
            <x-application-logo></x-application-logo>
        </section>
        <div class="flex flex-col">
            <h1 class="text-3xl text-center">@yield('error-name')</h1>
            <p class="text-center mt-4 text-lg gap-x-4">
                <a class="hover:underline hover:text-blue-500 hover:scale-[1.1]" href="{{ route('website.index') }}">Início</a>
                /
                <a class="hover:underline hover:text-blue-500 hover:scale-[1.1]" href="{{ route('profile.edit') }}">Perfil</a>
            </p>
        </div>
    </section>


</body>

</html>
