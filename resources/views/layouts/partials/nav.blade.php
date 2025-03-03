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
