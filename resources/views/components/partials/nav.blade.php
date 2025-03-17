<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-grand.svg') }}" alt="logo" class="w-[130px] sm:w-auto"></a>

    {{-- <div class="hidden md:block">
        <a href="" class="mx-4 text-sm font-semibold">A propos</a>
        <a href="" class="mx-4 text-sm font-semibold">Services</a>
        <a href="" class="mx-4 text-sm font-semibold">Contact</a>
    </div> --}}

    @auth
        <div>
            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-semibold text-black">
                {{ Auth::user()->name }}
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="flex text-sm lg:text-base items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                    Se déconnecter
                </button>
            </form>
        </div>
    @else
        <div>
            <a href="{{ route('login') }}">
                <button class="flex text-sm lg:text-base items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                    Se connecter
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </button>
            </a>
        </div>
    @endauth
</div>
