<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head :title="$title" />
    </head>
    <body>

        <!-- Blog Content -->
        <main>
            {{ $slot }}
        </main>
        <!-- End of Content List -->

    </body>
</html>
