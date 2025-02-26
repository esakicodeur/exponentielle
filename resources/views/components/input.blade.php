<div>
    <div class="flex justify-between max-w-[500px] scale-75 sm:scale-100 mx-auto mt-10 border border-black shadow-[-7px_7px_0px_#000000]">
        <input type='{{ $type }}' name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}" class="p-4 outline-none w-full" >
    </div>
    @if ($help)
        <p class="mt-2 text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
