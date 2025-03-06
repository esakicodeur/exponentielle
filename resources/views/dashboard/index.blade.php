<x-default-layout title="Gestion des posts">
    <div class="flex">

        <x-partials.sidebar />

        <div class="flex flex-col w-full">
            <div class="flex items-center justify-between w-full py-3 max-h-[60px] px-12 border-b border-black">
                <h3 class="font-medium">Tableaux de board</h3>
                <img class="w-5 h-5 sm:w-5 sm:h-5 object-cover rounded-full" src="{{ asset('images/logo-e-petit.svg') }}" alt="Image de profil de {{ Auth::user()->name }}">
            </div>

            <div class="grid grid-cols-4 gap-[30px] mt-[25px] pb-[15px] px-[10px]">
                <div class="h-[100px] rounded-[8px] bg-slate-100 border-l-[4px] border-[#4E73DF] flex items-center justify-between px-[30px] cursor-pointer hover:shadow-lg transform hover:scale-[103%] transition duration-300 ease-out">
                    <div>
                        <div class="text-2xl font-semibold mb-1">{{ $users->count() }}</div>
                        <div class="text-sm font-medium text-gray-400">Utilisateurs</div>
                    </div>
                </div>

                <div class="h-[100px] rounded-[8px] bg-slate-100 border-l-[4px] border-[#f0c38f] flex items-center justify-between px-[30px] cursor-pointer hover:shadow-lg transform hover:scale-[103%] transition duration-300 ease-out">
                    <div>
                        <div class="text-2xl font-semibold mb-1">{{ $posts->count() }}</div>
                        <div class="text-sm font-medium text-gray-400">Posts</div>
                    </div>
                </div>

                <div class="h-[100px] rounded-[8px] bg-slate-100 border-l-[4px] border-[#f08faf] flex items-center justify-between px-[30px] cursor-pointer hover:shadow-lg transform hover:scale-[103%] transition duration-300 ease-out">
                    <div>
                        <div class="text-2xl font-semibold mb-1">{{ $categories->count() }}</div>
                        <div class="text-sm font-medium text-gray-400">Categories</div>
                    </div>
                </div>

                <div class="h-[100px] rounded-[8px] bg-slate-100 border-l-[4px] border-[#e9f08f] flex items-center justify-between px-[30px] cursor-pointer hover:shadow-lg transform hover:scale-[103%] transition duration-300 ease-out">
                    <div>
                        <div class="text-2xl font-semibold mb-1">{{ $tags->count() }}</div>
                        <div class="text-sm font-medium text-gray-400">Tags</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
