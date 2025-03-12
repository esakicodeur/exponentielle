<x-default-layout title="Gestion des posts">
    <div class="flex">

        <x-partials.sidebar />

        <div class="flex flex-col w-full">
            <div class="flex items-center justify-between w-full py-3 max-h-[60px] px-12 border-b border-black">
                <h3 class="font-medium">Administration</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            <div class="mx-auto w-full sm:px-6 l:px-8 mt-4">
                <x-ui.alerts />
            </div>

            <div class="px-4 sm:px-6 lg:px-8 mt-5">
                <div class="flex flex-col">
                    <div class="sm:flex-auto">
                        <h1 class="text-2xl font-bold mt-4">Posts</h1>
                        <p class="mt-1 text-sm leading-6 text-gray-900">Interface d'administration du blog.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:flex-none">
                        <a href="{{ route('admin.posts.create') }}">
                            <button type="submit" class="mt-8 w-40 h-12 bg-black text-white">CREER UN POST</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="pb-12 pt-5">

                {{-- Livewire --}}
                <livewire:back-office.posts-table />

            </div>
        </div>
    </div>
</x-default-layout>
