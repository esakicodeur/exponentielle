<x-default-layout title="Uploader les images du post">
    <div class="flex">
        <div class="flex flex-col bg-slate-100">
            <div class="px-2 sm:pl-14 py-2 border border-black">
                <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-moyen.svg') }}" alt="logo"></a>
                {{-- class="w-[130px] sm:w-auto" --}}
            </div>

            <div class="w-28 sm:w-80 h-[100vh] relative py-12 border border-black">
                <div class="w-[50%] sm:w-[80%] absolute right-0">
                    <div class="flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
                        <p><a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-semibold text-black">
                            {{ Auth::user()->name }}
                        </a></p>

                        @if (Auth::user()->role->value === 'admin')
                            <x-heroicon-s-check-badge class="w-4 h-4 text-green-500" />
                        @endif
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Add Blogs</p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Add Blogs</p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                            Se déconnecter
                        </button>
                    </form>
                </div>
            </div>
        </div>

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
                        <a href="{{ url('post-image/' . $postImage->id . '/delete') }}" class="relative top-0 right-0"><x-heroicon-c-x-circle class="w-4 h-4 text-red-600" /></a>

                        <img class="mt-2 max-w-30 max-h-20" src="{{ asset($postImage->image) }}" alt="Images du post">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-default-layout>
