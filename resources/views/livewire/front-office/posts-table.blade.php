<div>
    <div class="flex flex-wrap justify-center w-full p-3 space-x-2 space-y-2 mb-3">
        {{-- Search Box --}}
        <div class="w-1/2 lg:w-1/2 sm:w-1/2 md:w-1/2 xl:w-1/2 xs:w-1/2">
            <span class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal leading-snug text-center text-gray-400 bg-transparent rounded">
                <x-heroicon-o-magnifying-glass class="w-6 h-6" />
            </span>
            <input wire:model.live.debounce.300ms="search" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-50" placeholder="Rechercher un post..." type="text">
        </div>

        {{-- Order By Category --}}
        <div class="relative w-1/2 lg:w-1/2 sm:w-1/2 md:w-1/2 xl:w-1/2 xs:w-1/2">
            <select wire:model.live="category_id" wire:change.live='category_id' class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                <option value="id">Selectionnez une categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex justify-center items-center mt-10 mb-10">
        <div wire:loading>
            <div style="border-top-color: transparent;" class="w-16 h-16 border-4 border-black border-solid rounded-full animate-spin"></div>
        </div>
    </div>

    <div class="flex flex-wrap justify-around gap-1 gap-y-10 mb-16 xl:mx-24">
        @if (count($posts) > 0)
            @forelse ($posts as $post)
                <x-post :$post />
            @empty
                <p class="text-xl lg:text-2xl text-slate-600">Aucun resultat.</p>
            @endforelse
        @endif
    </div>

    <div class="p-2 bg-indigo-300">
        {{ $posts->links() }}
    </div>
</div>
