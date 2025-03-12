<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

        {{-- Main Heading --}}
        <div class="flex w-full p-3 space-x-2">

            {{-- Search Box --}}
            <div class="w-3/6">
                <span class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal leading-snug text-center text-gray-400 bg-transparent rounded">
                    <x-heroicon-o-magnifying-glass class="w-6 h-6" />
                </span>
                <input wire:model.live.debounce.300ms="search" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-50" placeholder="Rechercher post..." type="text">
            </div>

            {{-- Order By --}}
            <div class="relative w-1/6">
                <select wire:model.live='orderBy' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="id">ID</option>
                    <option value="title">Title</option>
                    <option value="created_at">Created At</option>
                </select>
            </div>

            {{-- Order Asc --}}
            <div class="relative w-1/6">
                <select wire:model.live='orderAsc' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="1">Asc</option>
                    <option value="0">Desc</option>
                </select>
            </div>

            {{-- Per Page --}}
            <div class="relative w-1/6">
                <select wire:model.live='perPage' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>

        {{-- Table --}}
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
                        Images
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
                            <a href="{{ url('admin/posts/' . $post->id . '/upload') }}" class="w-20 h-10 px-5 py-2 bg-black text-white">Images</a>
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

        <div class="p-2 bg-indigo-300">
            {{ $posts->links() }}
        </div>
    </div>
</div>
