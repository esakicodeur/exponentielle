<x-default-layout :title="$post->exists() ? 'Modifier un post' : 'Créer un post'">
    <div class="flex">

        <x-partials.sidebar />

        <div class="flex flex-col w-full">
            <div class="flex items-center justify-between w-full py-3 max-h-[60px] px-12 border-b border-black">
                <h3 class="text-xl font-bold">Administration</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            <form action="{{ $post->exists() ? route('admin.posts.update', ['post' => $post]) : route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="py-5 px-5 sm:pt-12 sm:pl-16">
                @csrf

                @if ($post->exists())
                    @method('PATCH')
                @endif

                <h1 class="text-2xl font-bold mt-4">
                    {{ $post->exists() ? 'Modifier "' . $post->title . '"' : 'Créer un post' }}
                </h1>
                <p class="mt-1 text-sm leading-6 text-gray-900">Révélons au monde nos talents de scientifique.</p>

                <div class="mt-10 space-y-3 md:w-2/3">

                    <x-admin.input name="title" label="Titre" :value="$post->title" />

                    <x-admin.input name="slug" label="Slug" :value="$post->slug" help="Laisser vide pour un slug auto. Si une valeur est renseignee, elle sera slugifiee avant d'etre soumise a validation." />

                    {{-- textarea content --}}
                    <x-admin.textarea name="content" label="Contenu du post">{{ $post->content }}</x-admin.textarea>

                    {{-- input file thumbnail --}}
                    <x-admin.input name="thumbnail" type="file" :value="$post->thumbnail" label="Image de couverture" />

                    {{-- Select category_id --}}
                    <x-admin.select name="category_id" label="Categorie" :value="$post->category_id" :list="$categories" />

                    {{-- Select matiere_id --}}
                    <x-admin.select name="matiere_id" label="Matiere" :value="$post->matiere_id" :list="$matieres" />

                    {{-- select multiple tag ids --}}
                    <x-admin.select name="tag_ids" label="Etiquettes" :value="$post->tags" :list="$tags" multiple />
                </div>

                <div class="flex items-center justify-end gap-x-6">
                    <button type="submit" class="mt-8 w-40 h-12 bg-black text-white">
                        {{ $post->exists() ? 'Mettre à jour' : 'Publier' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-default-layout>
