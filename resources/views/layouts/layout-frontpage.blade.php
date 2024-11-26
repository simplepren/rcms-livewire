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
        <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('assets/vendors/jquery/jquery-3.7.1.min.js') }}" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body{
                background: rgb(89,124,131);
                background: linear-gradient(45deg, rgba(89,124,131,1) 0%, rgba(153,204,214,1) 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            {{ $slot }}
        </div>

        <footer class="">
            <div class="mx-auto w-full max-w-screen-xl">
              <div class="flex justify-center">
                <div class="w-full text-white py-4">
                    <div class="py-3 mb-4 border-b border-gray-300 flex justify-center"><span class="italic">Copyright</span> &nbsp; <span><p>&copy; 2024 Tim Arsiparis BPPK</span></div>
                    <div class="mb-3 flex gap-3 justify-center">
                        <x-my-warning-button class="text-sm">CONTACT US</x-my-warning-button>
                        <x-my-warning-button class="text-sm">GASS</x-my-warning-button>
                        <x-my-warning-button class="text-sm">RCMS</x-my-warning-button>
                    </div>
                    <div class="text-center">UNIT KEARSIPAN II</div>
                    <div class="text-center text-lg">BADAN PENDIDIKAN DAN PELATIHAN KEUANGAN</div>
                    <div class="text-center text-sm">Telp. +62 21-739-4-666</div>
                </div>
            </div>
        </footer>
    </body>
</html>
