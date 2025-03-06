<x-default-layout title="Uploader les images du post">
    <div class="flex">

        |<x-partials.sidebar />

        <div class="flex flex-col w-full">
            <div class="flex items-center justify-between w-full py-3 max-h-[60px] px-12 border-b border-black">
                <h3 class="text-xl font-bold">Administration</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            @if ($errors->any())
                <div class="rounded-md bg-red-50 p-4 mx-auto max-w-[600px] text-center mt-5">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-800">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ url('admin/posts/' . $post->id . '/upload') }}" method="POST" enctype="multipart/form-data" class="py-5 px-5 sm:pt-12 sm:pl-16">
                @csrf

                <h1 class="text-2xl font-bold mt-4">
                    Uploader les images du post : {{ $post->title }}
                </h1>
                <p class="mt-1 text-sm leading-6 text-gray-900">Revelons au monde nos talents de scientifique.</p>

                <div class="mt-10 space-y-3 md:w-2/3">

                    <div class="my-5 relative rounded-md shadow-sm">
                        <label for="images" class="block text-sm font-medium leading-6 text-gray-900">Uploader les images (Maximum 20 images)</label>
                        <input type="file" name="images[]" id="images" multiple class="form-input block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-x-6">
                    <button type="submit" class="mt-8 w-40 h-12 bg-black text-white">
                        Uploader
                    </button>
                </div>
            </form>

            <div class="flex flex-wrap justify-around mb-16 xl:mx-24">
                @foreach ($postImages as $postImage)
                    <div>
                        <a href="{{ url('admin/post-image/' . $postImage->id . '/delete') }}" class="relative top-0 right-0"><x-heroicon-c-x-circle class="w-4 h-4 text-red-600" /></a>

                        <img class="mt-2 max-w-30 max-h-20" src="{{ asset($postImage->image) }}" alt="Images du post">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-default-layout>
