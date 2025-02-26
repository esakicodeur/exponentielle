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
    <body>
        @if (session('status'))
            <div class="rounded-md bg-green-50 p-4 mx-auto max-w-[400px] text-center mt-5">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="ml-3">
                            <p class="text-xl font-medium text-green-800">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Blog Content -->
        <main>
            {{ $slot }}
        </main>
        <!-- End of Content List -->

    </body>
</html>
