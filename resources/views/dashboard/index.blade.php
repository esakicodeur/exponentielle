<x-default-layout title="Gestion des posts">
    <div class="flex">
        <div class="flex flex-col bg-slate-100">
            <div class="px-2 sm:pl-14 py-2 border border-black">
                <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-petit.svg') }}" alt="logo"></a>
            </div>

            <div class="w-28 sm:w-80 h-[100vh] relative py-12 border border-black">
                <div class="w-[50%] sm:w-[80%] absolute right-0">
                    <div class="flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
                        <p><a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-semibold text-black">
                            {{ Auth::user()->name }}
                        </a></p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Posts</p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Categories</p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Tags</p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Souscriptions</p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                            Se déconnecter
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex flex-col w-full">
            <div class="flex items-center justify-between w-full py-3 max-h-[60px] px-12 border-b border-black">
                <h3 class="font-medium">Tableaux de board</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>


        </div>
    </div>
</x-default-layout>
