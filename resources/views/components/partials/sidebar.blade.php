<div class="flex flex-col bg-slate-100">
    <div class="px-2 sm:pl-14 py-2 border border-black">
        <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-moyen.svg') }}" alt="logo"></a>
    </div>

    <div class="w-28 sm:w-80 min-h-screen relative py-12 border border-black">
        <div class="w-[50%] sm:w-[80%] absolute right-0">
            <div class="flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
                <p><a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-semibold text-black">
                    {{ Auth::user()->name }}
                </a></p>
                @if (Auth::user()->role->value === 'admin')
                    <x-heroicon-s-check-badge class="w-4 h-4 text-green-500" />
                @endif
            </div>

            @if (Auth::user()->role->value === 'admin')
            <a href="{{ route('admin.dashboard') }}">
                <div class="mt-5 {{ set_active_route('admin.dashboard') }} flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                    <p>Tableau de bord</p>
                </div>
            </a>
            <a href="{{ route('admin.posts.index') }}">
                <div class="mt-5 {{ set_active_route('admin.posts.index') }} flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                    <p>Posts</p>
                </div>
            </a>
            <a href="{{ route('admin.categories.index') }}">
                <div class="mt-5 {{ set_active_route('admin.categories.index') }} flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                    <p>Catégories</p>
                </div>
            </a>
            <a href="{{ route('admin.tags.index') }}">
                <div class="mt-5 {{ set_active_route('admin.tags.index') }} flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                    <p>Tags</p>
                </div>
            </a>
            <a href="{{ route('admin.users.index') }}">
                <div class="mt-5 {{ set_active_route('admin.users.index') }} flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                    <p>Utilisateurs</p>
                </div>
            </a>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                    Se déconnecter
                </button>
            </form>
        </div>
    </div>
</div>
