<x-default-layout>
    <!-- Header -->
    <header>
        <div class="py-5 px-5 md:px-12 lg:px-28">

            @include('layouts.partials.nav')

            @include('layouts.partials.hero')
        </div>
    </header>
    <!-- End of Header -->

    <!-- Content -->
    <div>
        <!-- Category List -->
        <div class="flex justify-center gap-6 my-10">
            <button class="bg-black text-white py-1 px-4 rounded-sm">All</button>
            @foreach ($categories as $category)
            <a href="{{ route('posts.byCategory', ['category' => $category]) }}">
                <button class="">{{ $category->name }}</button>
            </a>
            @endforeach

        </div>
        <!-- End of Category List -->

        <!-- Blog List -->
        <div class="flex flex-wrap justify-around gap-1 gap-y-10 mb-16 xl:mx-24">
            @forelse($posts as $post)
                <x-post :$post />
            @empty
                <p class="text-xl lg:text-2xl text-slate-600">Aucun resultat.</p>
            @endforelse
        </div>
        <!-- End of Blog List -->

        <div class="flex justify-center items-center">
            {{ $posts->links() }}
        </div>
    </div>
    <!-- End of Content -->

    <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- End of Footer -->
</x-default-layout>
