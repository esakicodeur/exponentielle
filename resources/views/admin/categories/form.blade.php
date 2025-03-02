<x-default-layout :title="$category->exists() ? 'Modifier une categorie' : 'Creer une categorie'">
    <div class="flex">
        <div class="flex flex-col bg-slate-100">
            <div class="px-2 sm:pl-14 py-2 border border-black">
                <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-moyen.svg') }}" alt="logo"></a>
            </div>

            <div class="w-28 sm:w-80 h-[100vh] relative py-12 border border-black">
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
                <h3 class="text-xl font-bold">Administration</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            <form action="{{ $category->exists() ? route('admin.categories.update', ['category' => $category]) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="py-5 px-5 sm:pt-12 sm:pl-16">
                @csrf

                @if ($category->exists())
                    @method('PATCH')
                @endif

                <h1 class="text-2xl font-bold mt-4">
                    {{ $category->exists() ? 'Modifier "' . $category->name . '"' : 'Creer une categorie' }}
                </h1>
                <p class="mt-1 text-sm leading-6 text-gray-900">Revelons au monde nos talents de scientifique.</p>

                <div class="mt-10 space-y-3 md:w-2/3">

                    <x-admin.input name="name" label="Nom" :value="$category->name" />

                    <x-admin.input name="slug" label="Slug" :value="$category->slug" help="Laisser vide pour un slug auto. Si une valeur est renseignee, elle sera slugifiee avant d'etre soumise a validation." />
                </div>

                <div class="flex items-center justify-end gap-x-6">
                    <button type="submit" class="mt-8 w-40 h-12 bg-black text-white">
                        {{ $category->exists() ? 'Mettre a jour' : 'Publier' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-default-layout>
