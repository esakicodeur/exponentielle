<div>
    <div class="flex justify-between max-w-[500px] scale-75 sm:scale-100 mx-auto mt-10 border border-black shadow-[-7px_7px_0px_#000000]">
        <input type='{{ $type }}' name="{{ $name }}" value="{{ old($name) ?? $value }}" placeholder="{{ $placeholder }}" class="p-4 outline-none w-full" >
    </div>

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror

    @if ($help)
        <p class="mt-2 text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
