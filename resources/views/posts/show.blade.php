<x-layout :title="$post->title">
    <!-- Post Detail -->
    <div class="bg-gray-200 py-5 px-5 md:px-12 lg:px-28">
        <div class="flex justify-between items-center">
            <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-grand.svg') }}" alt="logo" class="w-[130px] sm:w-auto"></a>

            <button class="flex items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                S'inscrire
                <x-heroicon-o-arrow-right class="w-4 h-4" />
            </button>
        </div>

        <div class="text-center my-24">
            <h1 class="text-2xl sm:text-5xl font-semibold max-w-[700px] mx-auto">{{ $post->title }}</h1>
        </div>
    </div>

    <div class="mx-5 max-w-[800px] md:mx-auto mt-[-100px] mb-10">
        <img src="{{ asset('images/blog-1.png') }}" alt="logo" width="1280" height="720" class="border-4 border-white">

        <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
            @if ($post->category)
                <a href="">
                    <p class="mt-5 px-3 py-1 bg-black text-white text-sm">{{ $post->category->name }}</p>
                </a>
            @endif

            <ul class="flex flex-wrap gap-2">
                <li><a href="" class="px-3 py-1 bg-black text-white rounded-full text-xs">Maths</a></li>
                <li><a href="" class="px-3 py-1 bg-black text-white rounded-full text-xs">Physique</a></li>
                <li><a href="" class="px-3 py-1 bg-black text-white rounded-full text-xs">Chimie</a></li>
            </ul>

            <p class="text-xl lg:text-2xl text-slate-600">
                {!! nl2br(e($post->content)) !!}
            </p>

            <time class="text-xs" datetime="{{ $post->created_at }}">{{ $post->created_at->format('d/m/Y H:i:s') }}</time>
        </div>
    </div>
    <!-- End of Post Detail -->
</x-layout>
