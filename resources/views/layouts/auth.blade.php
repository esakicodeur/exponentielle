<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased h-full bg-gray-50">
        <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-grand.svg') }}" alt="logo" class="w-[100px] sm:w-auto mx-auto w-auto"></a>

            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[400px]">
                <div class="bg-white px-6 py-6 shadow sm:rounded-lg sm:px-12">
                    <form action="{{ $action }}" method="POST">
                        @csrf

                        {{ $slot }}

                        <div class="mt-10 flex justify-center">
                            <button type="submit" class="flex text-xl text-center items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                                {{ $submitMessage }}
                            </button>
                        </div>

                    </form>

                    <p class="text-sm text-slate-600 mt-5 flex justify-center">
                        {{ $msg }} <a href="" class="text-black font-bold ml-3">{{ $choix }}</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
