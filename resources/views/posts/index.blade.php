<x-default-layout>
    <!-- Header -->
    <header>
        <div class="py-5 px-5 md:px-12 lg:px-28">
            <div class="flex justify-between items-center">
                <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-grand.svg') }}" alt="logo" class="w-[130px] sm:w-auto"></a>

                @auth
                    <div>
                        <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-semibold text-black">
                            {{ Auth::user()->name }}
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="flex items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                                Se déconnecter
                            </button>
                        </form>
                    </div>
                @else
                    <div>
                        <a href="{{ route('login') }}">
                            <button class="flex items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                                Se connecter
                                <x-heroicon-o-arrow-right class="w-4 h-4" />
                            </button>
                        </a>
                    </div>
                @endauth
            </div>

            <div class="text-center my-8">
                <h1 class="text-3xl sm:text-5xl font-medium">Toutes les épreuves</h1>
                <p class="mt-10 max-w-[750px] mx-auto text-2xl sm:text-xl"> &quot; Lire ton cours avant de faire les exercices te délivre de tous les démons du faxage. &quot; </p>

                <form action="{{ route('posts.index') }}" class="flex justify-between max-w-[500px] scale-75 sm:scale-100 mx-auto mt-10 border border-black shadow-[-7px_7px_0px_#000000]">
                    <input type='search' name="search" value="{{ request()->search }}" placeholder="Entrez votre recherche..." class="pl-4 outline-none" >

                    <button type="submit" class="border-l border-black py-4 px-4 sm:px-8 active:bg-gray-600 active:text-white">Rechercher</button>
                </form>
            </div>
        </div>
    </header>
    <!-- End of Header -->

    <!-- Content -->
    <div>
        <!-- Category List -->
        <div class="flex justify-center gap-6 my-10">
            <button class="bg-black text-white py-1 px-4 rounded-sm">All</button>
            @foreach ($categories as $category)
            <a href="{{ route('posts.byCategory', ['category' => $category]) }}">
                <button>{{ $category->name }}</button>
            </a>
            @endforeach

        </div>
        <!-- End of Category List -->

        <!-- Blog List -->
        <div class="flex flex-wrap justify-around gap-1 gap-y-10 mb-16 xl:mx-24">
            @forelse($posts as $post)
                <x-post :$post />
            @empty
                <p class="text-xl lg:text-2xl text-slate-600">Aucun resultat.</p>
            @endforelse
        </div>
        <!-- End of Blog List -->

        <div class="flex justify-center items-center">
            {{ $posts->links() }}
        </div>
    </div>
    <!-- End of Content -->

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
</x-default-layout>
