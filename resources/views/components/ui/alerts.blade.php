@if (session('status'))
    <div
        x-data="{open: true}"
        x-init="setTimeout(() => {open = false}, 3000)"
        x-show="open"
        x-transition:enter="transition duration-500 transform ease-out"
        x-transition:start="opacity-1"
        x-transition:leave="transition duration-500 transform ease-in"
        x-transition:leave-end="opacity-0"
        class="flex items-center p-2 mb-4 text-white bg-green-600 rounded"
    >
        <x-heroicon-o-check-circle class="w-5 pt-1 mr-3 text-white" />

        <span>
            {{ session('status') }}
        </span>
    </div>
@endif
