<x-default-layout :title="$category->exists() ? 'Modifier une categorie' : 'Creer une categorie'">
    <div class="flex">
        @include('layouts.partials.sidebar')

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
