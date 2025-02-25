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
        <!-- Blog Content -->
        <main>
            {{ $slot }}
        </main>
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
