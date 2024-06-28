<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
         <style>
            .gradient-bg {

                background-image: linear-gradient(60deg, #64b3f4 0%, #c2e59c 100%);

            }
        </style>
    </head>
    <body class="font-sans antialiased gradient-bg" >
        <div class="min-h-screen">
            @if(Session::has('message'))
                <div id="toast-message" class="fixed z-50 flex items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow bottom-5 left-5 dark:text-green-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <div class="ps-4 text-sm font-normal">{{ Session::get('message') }}</div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function() {
                            var toast = document.getElementById('toast-message');
                            if (toast) {
                                toast.style.display = 'none';
                            }
                        }, 5000); // 5 seconds
                    });
                </script>
            @endif
            <div class="sm:px-6 lg:px-8 pt-5">
                <!-- <livewire:layout.navigation /> -->
                @include('layouts.navigation')
            </div>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800">
                    <div class="py-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </body>
</html>
