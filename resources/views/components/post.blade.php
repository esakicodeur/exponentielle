<!-- Post Item -->
<div class="max-w-[330px] sm:max-w-[300px] bg-white border border-black hover:shadow-[-7px_7px_0px_#000000]">
    <a href="{{ route('posts.show', ['post' => $post]) }}">
        <img src="{{ str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}" alt="Miniature" class="border-b border-black w-full max-h-72 object-cover">
    </a>

    @if ($post->matiere)
        {{-- <a href="{{ route('posts.byCategory', ['category' => $post->category]) }}"> --}}
            <p class="ml-2 px-1 inline-block bg-black text-white text-sm">{{ $post->matiere->name }}</p>
        {{-- </a> --}}
    @endif

    @if ($post->category)
        {{-- <a href="{{ route('posts.byCategory', ['category' => $post->category]) }}"> --}}
            <p class="ml-2 px-1 inline-block bg-black text-white text-sm">{{ $post->category->name }}</p>
        {{-- </a> --}}
    @endif

    <div class="p-2">
        <a href="{{ route('posts.show', ['post' => $post]) }}">
            <h5 class="text-lg font-medium tracking-tight text-gray-900">{{ $post->title }}</h5>
        </a>

        {{-- <p class="mb-3 text-sm tracking-tight text-gray-700">{{ $post->excerpt }}</p>

        <a href="{{ route('posts.show', ['post' => $post]) }}" class="inline-flex items-center py-2 font-semibold text-center">
            Voir <x-heroicon-o-arrow-right class="w-4 h-4 ml-2" />
        </a> --}}
    </div>
</div>
<!-- End of Post Item -->
