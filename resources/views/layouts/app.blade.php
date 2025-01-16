<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin DPMPTSP</title>
        <link rel="icon" href="https://web.dpmptsp.padang.go.id/assets/Logo_Padang.svg">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50 flex flex-col">
            @include('layouts.navigation')
            @include('layouts.sidebar')
            <main class="p-4 md:ml-64 h-auto pt-20 flex-grow">
                @yield('app')
            </main>
            <div class="pt-24">
                @include('layouts.footer-admin')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        @stack('scripts')  
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modals = document.querySelectorAll('[data-modal-toggle]');
                modals.forEach(function(modal) {
                    new Modal(modal);
                });
            });
        </script>
    </body>
</html>