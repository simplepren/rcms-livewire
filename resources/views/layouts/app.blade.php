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

        <!-- CSS Toastr -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        <script src="{{ asset('assets/vendors/jquery/jquery-3.7.1.min.js') }}" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- JS Toastr -->
        <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-200 dark:bg-gray-900">
            <livewire:layout.navbar-full />
            <div class="p-2 min-h-full">
                {{ $slot }}
            </div>
        </div>
        <footer>
            <div class="mx-auto w-full max-w-screen-xl">
              <div class="flex justify-center">
                <div class="w-full text-gray-800">
                    <div class="pt-3 mb-4 flex justify-center"><span class="italic">Copyright</span> &nbsp; <span><p>&copy; 2022 Tim Arsiparis BPPK</span></div>
                </div>
            </div>
        </footer>

        {{-- <script src="./node_modules/preline/dist/preline.js"></script> --}}
        <script data-navigate-once>
            $(document).ready(function() {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true,
                    "onclick": null,
                    "showDuration": "1300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
            })

            window.addEventListener('success', event => {
                toastr.success(event.detail[0].message)
            })
            window.addEventListener('warning', event => {
                toastr.warning(event.detail[0].message)
            })
            window.addEventListener('error', event => {
                toastr.error(event.detail[0].message)
            })

            function inArray(needle,haystack)
            {
                var count=haystack.length;
                for(var i=0;i<count;i++)
                {
                    if(haystack[i]===needle){return true;}
                }
                return false;
            }
        </script>

    </body>
</html>
