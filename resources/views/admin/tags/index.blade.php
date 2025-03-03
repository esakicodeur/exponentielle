<x-default-layout title="Gestion des tags">
    <div class="flex">
        @include('layouts.partials.sidebar')

        <div class="flex flex-col w-full">
            <div class="flex items-center justify-between w-full py-3 max-h-[60px] px-12 border-b border-black">
                <h3 class="font-medium">Administration</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            <div class="px-4 sm:px-6 lg:px-8 mt-5">
                <div class="flex flex-col">
                    <div class="sm:flex-auto">
                        <h1 class="text-2xl font-bold mt-4">Tags</h1>
                        <p class="mt-1 text-sm leading-6 text-gray-900">Interface d'administration du blog.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:flex-none">
                        <a href="{{ route('admin.tags.create') }}">
                            <button type="submit" class="mt-8 w-40 h-12 bg-black text-white">CREER UN TAG</button>
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
                                        Nom
                                    </th>
                                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                            {{ $tag->id }}
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                            <a href="" class="hover:text-indigo-900">
                                                {{ $tag->name }}
                                            </a>
                                        </td>
                                        <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <div class="flex justify-start space-x-1">
                                                <a href="{{ route('admin.tags.edit', ['tag' => $tag]) }}" class="p-1 border-2 border-indigo-500 rounded-md">
                                                    <x-heroicon-s-pencil-square class="w-4 h-4" />
                                                </a>

                                                <form action="{{ route('admin.tags.destroy', ['tag' => $tag]) }}" method="POST">
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
