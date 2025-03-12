<div>
    <div class="flex flex-wrap justify-around gap-1 gap-y-10 mb-16 xl:mx-24">
        @forelse ($posts as $post)
            <x-post :$post />
        @empty
            <p class="text-xl lg:text-2xl text-slate-600">Aucun resultat.</p>
        @endforelse
    </div>
</div>
