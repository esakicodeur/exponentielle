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
        <!-- Header -->
        <header>
            <div class="py-5 px-5 md:px-12 lg:px-28">
                <div class="flex justify-between items-center">
                    <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-grand.svg') }}" alt="logo" class="w-[130px] sm:w-auto"></a>

                    <button class="flex items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                        S'inscrire
                        <x-heroicon-o-arrow-right class="w-4 h-4" />
                    </button>
                </div>

                <div class="text-center my-8">
                    <h1 class="text-3xl sm:text-5xl font-medium">Toutes les epreuves</h1>
                    <p class="mt-10 max-w-[750px] mx-auto text-xl sm:text-xl"> &quot; Lire ton cours avant de faire les exercices te delivre de tous les demons du faxage. &quot; </p>

                    <form action="" class="flex justify-between max-w-[500px] scale-75 sm:scale-100 mx-auto mt-10 border border-black shadow-[-7px_7px_0px_#000000]">
                        <input type="email" placeholder="Entrer votre recherche..." class="pl-4 outline-none" >

                        <button type="submit" class="border-l border-black py-4 px-4 sm:px-8 active:bg-gray-600 active:text-white">Rechercher</button>
                    </form>
                </div>
            </div>
        </header>
        <!-- End of Header -->

        <!-- Blog Content -->
        <div>
            <!-- Category List -->
            <div class="flex justify-center gap-6 my-10">
                <button class="bg-black text-white py-1 px-4 rounded-sm">All</button>
                <button>3 eme</button>
                <button>1 ere A</button>
                <button>1 ere C</button>
                <button>1 ere D</button>
                <button>Tle A</button>
                <button>Tle C</button>
                <button>Tle D</button>
            </div>
            <!-- End of Category List -->

            <!-- Blog List -->
            <div class="flex flex-wrap justify-around gap-1 gap-y-10 mb-16 xl:mx-24">
                @foreach ($posts as $post)
                <!-- Post Item -->
                <div class="max-w-[330px] sm:max-w-[300px] bg-white border border-black hover:shadow-[-7px_7px_0px_#000000]">
                    <img src="{{ asset('images/blog-2.png') }}" alt="Miniature" class="border-b border-black w-full max-h-72 object-cover">
                    {{-- <img src="{{ $post->thumbnail }}" alt="Miniature" class="border-b border-black w-full max-h-72 object-cover"> --}}

                    <p class="ml-5 mt-5 px-1 inline-block bg-black text-white text-sm">Terminale C</p>
                    <div class="p-5">
                        <h5 class="mb-2 text-lg font-medium tracking-tight text-gray-900">{{ $post->title }}</h5>
                        <p class="mb-3 text-sm tracking-tight text-gray-700">{{ $post->excerpt }}</p>
                        <a href="{{ route('posts.show', ['post' => $post]) }}" class="inline-flex items-center py-2 font-semibold text-center">
                            Lire la suite <x-heroicon-o-arrow-right class="w-4 h-4 ml-2" />
                        </a>
                    </div>
                </div>
                <!-- End of Post Item -->
                @endforeach
            </div>
            <!-- End of Blog List -->

            <div class="flex justify-center items-center">
                {{ $posts->links() }}
            </div>
        </div>
        <!-- End of Content List -->

        <!-- Footer -->
        <footer>
            <div class="flex flex-wrap justify-around bg-black py-5 items-center mt-10 px-5">
                <div>
                    <img src="{{ asset('images/logo-grand-blanc.svg') }}" alt="logo" class="w-[130px] sm:w-auto">
                </div>

                <div class="max-w-[400px]">
                    <p class="text-sm text-white">
                        Quos incidunt suscipit similique accusantium fuga aspernatur sequi atque tempore blanditiis sit veritatis repellat, voluptatem, magnam fugit, architecto delectus magni alias debitis.
                    </p>
                </div>

                <div class="max-w-[400px]">
                    <p class="text-sm text-white">
                        Quos incidunt suscipit similique accusantium fuga aspernatur sequi atque tempore blanditiis sit veritatis repellat, voluptatem, magnam fugit, architecto delectus magni alias debitis.
                    </p>
                </div>
            </div>

            <div class="flex justify-center bg-black py-5">
                <form action="" class="flex justify-between max-w-[200px] scale-75 sm:scale-100 mx-auto mt-5 border border-black shadow-[-7px_7px_0px_#FFFFFF]">
                    <input type="email" placeholder="Entrer votre email..." class="pl-4 outline-none" >

                    <button type="submit" class="border-l border-black bg-white text-black py-4 px-4 sm:px-8 active:bg-gray-200 active:text-white">Souscrire</button>
                </form>
            </div>

            <div class="flex justify-center bg-black py-5">
                <p class="text-sm text-white">Tous droits reserves. Copyright @exponentielle</p>
            </div>
        </footer>
        <!-- End of Footer -->
    </body>
</html>
