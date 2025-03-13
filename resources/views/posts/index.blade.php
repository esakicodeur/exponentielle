<x-default-layout>
    <!-- Header -->
    <header>
        <div class="py-5 px-5 md:px-12 lg:px-28">

            <x-partials.nav />

            {{-- <x-partials.hero /> --}}
        </div>
    </header>
    <!-- End of Header -->

    <!-- Content -->
    <div class="py-5 px-5 md:px-12 lg:px-28">
        <livewire:front-office.posts-table />
    </div>
    <!-- End of Content -->

    <!-- Footer -->
    <x-partials.footer />
    <!-- End of Footer -->
</x-default-layout>
