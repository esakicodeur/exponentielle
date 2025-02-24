<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <!-- Desktop navigation menu -->
        <header>
            <div class="py-5 px-5 md:px-12 lg:px-28">
                <div class="flex justify-between items-center">
                    <a href="{{ route('index') }}"><img src="{{ asset('images/logo-grand.svg') }}" alt="logo" class="w-[130px] sm:w-auto"></a>

                    <button class="flex items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                        Get started
                        <x-heroicon-o-arrow-right class="w-4 h-4" />
                    </button>
                </div>

                <div class="text-center my-8">
                    <h1 class="text-3xl sm:text-5xl font-medium">Toutes les epreuves</h1>
                    <p class="mt-10 max-w-[750px] mx-auto text-xl sm:text-xl"> &quot; Lire ton cours avant de faire les exercices te delivre de tous les demons du faxage. &quot; </p>

                    <form action="" class="flex justify-between max-w-[500px] scale-75 sm:scale-100 mx-auto mt-10 border border-black shadow-[-7px_7px_0px_#000000]">
                        <input type="email" placeholder="Entrer votre email..." class="pl-4 outline-none" >

                        <button type="submit" class="border-l border-black py-4 px-4 sm:px-8 active:bg-gray-600 active:text-white">Souscrire</button>
                    </form>
                </div>
            </div>
        </header>
    </body>
</html>
