<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo-e-petit.png') }}">

<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">

{{-- Facebook --}}
<meta property="og:description" content="@yield('description')">
<meta property="og:image" content="@yield('metaImage')">
<meta property="og:image:type" content="image/jpeg">

<title>{{ $title }}</title>


<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Styles / Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

{{-- Livewire style --}}
@livewireStyles
