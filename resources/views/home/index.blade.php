<x-default-layout title="Mon compte">
    <div class="flex">

        <x-partials.sidebar />

        <div class="flex flex-col w-full">
            <div class="flex items-center justify-between w-full py-3 max-h-[60px] px-12 border-b border-black">
                <h3 class="font-medium">Mon compte</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            <div class="mx-auto w-full sm:px-6 l:px-8 mt-4">
                <x-ui.alerts />
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
