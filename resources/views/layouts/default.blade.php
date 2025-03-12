<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head :title="$title" />
    </head>
    <body>

        <!-- Blog Content -->
        <main class="bg-gray-50">
            {{ $slot }}
        </main>
        <!-- End of Content List -->

        {{-- Livewire scripts --}}
        @livewireScripts
    </body>
</html>
