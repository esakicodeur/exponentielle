<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') . ' | ' . $post->title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <!-- Post Detail -->
        <div class="bg-gray-200 py-5 px-5 md:px-12 lg:px-28">
            <div class="flex justify-between items-center">
                <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-grand.svg') }}" alt="logo" class="w-[130px] sm:w-auto"></a>

                <button class="flex items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                    S'inscrire
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </button>
            </div>

            <div class="text-center my-24">
                <h1 class="text-2xl sm:text-5xl font-semibold max-w-[700px] mx-auto">{{ $post->title }}</h1>
            </div>
        </div>

        <div class="mx-5 max-w-[800px] md:mx-auto mt-[-100px] mb-10">
            <img src="{{ asset('images/blog-1.png') }}" alt="logo" width="1280" height="720" class="border-4 border-white">

            <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
                <a href="">
                    <p class="mt-5 px-3 py-1 bg-black text-white text-sm">Terminale C</p>
                </a>

                <ul class="flex flex-wrap gap-2">
                    <li><a href="" class="px-3 py-1 bg-black text-white rounded-full text-sm">Tag 1</a></li>
                    <li><a href="" class="px-3 py-1 bg-black text-white rounded-full text-sm">Tag 2</a></li>
                </ul>

                <p class="text-xl lg:text-2xl text-slate-600">
                    {!! nl2br(e($post->content)) !!}
                </p>

                <time class="text-xs" datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
            </div>
        </div>

        <!-- End of Post Detail -->
    </body>
</html>
