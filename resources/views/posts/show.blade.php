<x-default-layout :title="$post->title">
    <!-- Post Detail -->
    <div class="bg-gray-200 py-5 px-5 md:px-12 lg:px-28">

        @include('layouts.partials.nav')

        <div class="text-center my-24">
            <h1 class="text-2xl sm:text-5xl font-semibold max-w-[700px] mx-auto">{{ $post->title }}</h1>
        </div>
    </div>

    <div class="mx-5 max-w-[800px] md:mx-auto mt-[-100px] mb-10">
        <img src="{{ str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}" alt="Miniature"  width="1280" height="720" class="border-4 border-white">

        @foreach ($postImages as $postImage)
            <div class="flex bg-slate-50 p-6 rounded-lg">
                <img class="mt-2 mx-auto w-full" src="{{ asset($postImage->image) }}" alt="Images du post">
            </div>
        @endforeach

        <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12 mb-5">
            @if ($post->category)
                <a href="{{ route('posts.byCategory', ['category' => $post->category]) }}">
                    <p class="mt-5 px-3 py-1 bg-black text-white text-sm">{{ $post->category->name }}</p>
                </a>
            @endif

            @if ($post->tags->isNotEmpty())
                <ul class="flex flex-wrap gap-2">
                    @foreach ($post->tags as $tag)
                        <li><a href="{{ route('posts.byTag', ['tag' => $tag]) }}" class="px-3 py-1 bg-black text-white rounded-full text-xs">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            @endif

            <p class="text-xl lg:text-2xl text-slate-600">
                {!! nl2br(e($post->content)) !!}
            </p>

            <time class="text-xs" datetime="{{ $post->created_at }}">{{ $post->created_at->format('d/m/Y H:i:s') }}</time>

        </div>
        <!-- Comment -->
        @auth
            <form action="{{ route('posts.comment', ['post' => $post]) }}" method="POST">
                @csrf

                <div class="max-w-[500px] scale-75 sm:scale-100 mt-10 border border-black shadow-[-7px_7px_0px_#000000]">
                    <textarea name="comment" class="p-4 outline-none w-full" placeholder="Entrez votre commentaire ici !!!"></textarea>
                </div>

                @error('comment')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="my-5">
                    <button type="submit" class="flex text-sm text-center items-center gap-2 font-medium py-1 px-3 sm:py-3 sm:px-6 border border-solid border-black shadow-[-7px_7px_0px_#000000]">
                        Poster
                    </button>
                </div>
            </form>
        @endauth
        <!-- End of Comment -->

        <div class="space-y-8">
            @foreach ($post->comments as $comment)
                <div class="flex bg-slate-50 p-6 rounded-lg">
                    <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ $comment->user->name }}">

                    <div class="ml-4 flex flex-col">
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <h2 class="font-bold text-slate-900 text-2xl">
                                {{ $comment->user->name }}
                            </h2>
                            <time class="text-xs mt-2 sm:mt-0 sm:ml-4 text-slate-400" datetime="{{ $post->created_at }}">{{ $post->created_at->format('d/m/Y H:i:s') }}</time>
                        </div>

                        <p class="mt-4 sm:leading-loose text-slate-800">
                            {!! nl2br(e($comment->content)) !!}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End of Post Detail -->


</x-default-layout>
