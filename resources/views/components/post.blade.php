<!-- Post Item -->
<div class="max-w-[330px] sm:max-w-[300px] bg-white border border-black hover:shadow-[-7px_7px_0px_#000000]">
    <a href="{{ route('posts.show', ['post' => $post]) }}">
        <img src="{{ asset('images/blog-2.png') }}" alt="Miniature" class="border-b border-black w-full max-h-72 object-cover">
        {{-- <img src="{{ $post->thumbnail }}" alt="Miniature" class="border-b border-black w-full max-h-72 object-cover"> --}}
    </a>

    @if ($post->category)
        <a href="{{ route('posts.byCategory', ['category' => $post->category]) }}">
            <p class="ml-5 mt-5 px-1 inline-block bg-black text-white text-sm">{{ $post->category->name }}</p>
        </a>
    @endif

    <div class="p-5">
        <h5 class="mb-2 text-lg font-medium tracking-tight text-gray-900">{{ $post->title }}</h5>

        <p class="mb-3 text-sm tracking-tight text-gray-700">{{ $post->excerpt }}</p>

        <a href="{{ route('posts.show', ['post' => $post]) }}" class="inline-flex items-center py-2 font-semibold text-center">
            Voir <x-heroicon-o-arrow-right class="w-4 h-4 ml-2" />
        </a>
    </div>
</div>
<!-- End of Post Item -->
