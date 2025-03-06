<div class="text-center my-8">
    <h1 class="text-3xl sm:text-5xl font-medium">Toutes les épreuves</h1>
    <p class="mt-10 max-w-[750px] mx-auto text-2xl sm:text-xl"> &quot; Lire ton cours avant de faire les exercices te délivre de tous les démons du faxage. &quot; </p>

    <form action="{{ route('posts.index') }}" class="flex justify-between max-w-[500px] scale-75 sm:scale-100 mx-auto mt-10 border border-black shadow-[-7px_7px_0px_#000000]">
        <input type='search' name="search" value="{{ request()->search }}" placeholder="Entrez votre recherche..." class="pl-4 outline-none" >

        <button type="submit" class="border-l border-black py-4 px-4 sm:px-8 active:bg-gray-600 active:text-white">Rechercher</button>
    </form>
</div>
