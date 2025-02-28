<x-default-layout title="Gestion des posts">
    <div class="flex">
        <div class="flex flex-col bg-slate-100">
            <div class="px-2 sm:pl-14 py-2 border border-black">
                <a href="{{ route('posts.index') }}"><img src="{{ asset('images/logo-petit.svg') }}" alt="logo"></a>
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
                        <p>Posts</p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Categories</p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Tags</p>
                    </div>
                    <div class="mt-5 flex items-center border border-black gap-3 font-medium px-3 py-2 bg-white shadow-[-5px_5px_0px_#000000]">
                        <p>Souscriptions</p>
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
                <h3 class="font-medium">Administration</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            <div class="px-4 sm:px-6 lg:px-8 mt-5">
                <div class="flex flex-col">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold leading-6 text-gray-900">Posts</h1>
                        <p>Interface d'administration du blog.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:flex-none">
                        <a href="{{ route('admin.posts.create') }}">
                            <button type="submit" class="mt-8 w-40 h-12 bg-black text-white">CREER UN POST</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="pb-12 pt-5">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="font-bold bg-black text-white">
                                <tr>
                                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    </th>
                                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                        Id
                                    </th>
                                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                        Titre
                                    </th>
                                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                        Date
                                    </th>
                                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                            {{ $post->id }}
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                            <a href="{{ route('posts.show', ['post' => $post]) }}" class="hover:text-indigo-900">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                            {{ $post->created_at }}
                                        </td>
                                        <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <div class="flex justify-start space-x-1">
                                                <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="p-1 border-2 border-indigo-500 rounded-md">
                                                    <x-heroicon-s-pencil-square class="w-4 h-4" />
                                                </a>

                                                <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="p-1 border-2 border-red-600 rounded-md">
                                                        <x-heroicon-s-trash class="w-4 h-4" />
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
