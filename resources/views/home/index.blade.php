<x-default-layout title="Mon compte">
    <div class="flex">
        <div class="flex flex-col bg-slate-100">
            <div class="px-2 sm:pl-14 py-2 border border-black">
                <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-petit.svg') }}" alt="logo"></a>
                {{-- class="w-[130px] sm:w-auto" --}}
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
                        <p>Add Blogs</p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Add Blogs</p>
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
                <h3 class="font-medium">Mon compte</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            <form action="{{ route('home') }}" method="POST" class="pt-5 px-5 sm:pt-12 sm:pl-16">
                @csrf
                @method('PATCH')

                <h1 class="text-2xl font-bold mt-4">Mot de passe</h1>
                <p class="mt-1 text-sm leading-6 text-gray-900">Vous pouvez modifier votre mot de passe pour vos futures connexions.</p>

                <div class="mt-10 space-y-3 md:w-2/3">
                    <p class="text-xl">Mot de passe actuel</p>
                    <input type="password" name="current_password" class="w-full sm:w-[500px] px-4 py-3 border">
                    @error("current_password")
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <p class="text-xl">Nouveau mot de passe</p>
                    <input type="password" name="password" class="w-full sm:w-[500px] px-4 py-3 border">
                    @error("password")
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <p class="text-xl">Confirmation du nouveau mot de passe</p>
                    <input type="password" name="password_confirmation" class="w-full sm:w-[500px] px-4 py-3 border">
                </div>

                <button type="submit" class="mt-8 w-40 h-12 bg-black text-white">MODIFIER</button>
            </form>
        </div>
    </div>
</x-default-layout>
