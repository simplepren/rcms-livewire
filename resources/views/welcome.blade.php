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
            <div class="flex justify-center px-1">
                <div class="py-2 w-full sm:max-w-7xl bg-slate-200">
                    <div class="p-5 lg:flex gap-6 lg:w-full hidden">
                        <div><img src="{{ asset('assets/images/logo/KearsipanBPPK.png') }}" alt="" width="80px"></div>
                        <div class="flex items-center">
                            <span class="text-2xl font-semibold text-gray-600">BPPK RECORDS CENTER</span>
                        </div>
                    </div>
                    <div class="mb-3 lg:hidden flex justify-center">
                        <div><img src="{{ asset('assets/images/logo/KearsipanBPPK.png') }}" alt="" width="40px"></div>
                    </div>
                    <div class="w-full grid md:grid-cols-5 grid-cols-1">
                        <div class="bg-cyan-600 text-white h-10 flex items-center justify-center">HOME</div>
                        <div class="bg-green-600 text-white h-10 flex items-center justify-center">PERATURAN KEARSIPAN</div>
                        <div class="bg-blue-600 text-white h-10 flex items-center justify-center">PEMINJAMAN ARSIP</div>
                        <div class="bg-orange-600 text-white h-10 flex items-center justify-center">MATERI KEARSIPAN</div>
                        <div class="bg-amber-600 text-white h-10 flex items-center justify-center">ARSIP BERSEJARAH</div>
                    </div>
                    <div class="px-4 mt-4">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                              <li class="inline-flex items-center">
                                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                  </svg>
                                  Home
                                </a>
                              </li>
                              <li>
                                <div class="flex items-center">
                                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                  </svg>
                                  <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                                </div>
                              </li>
                              <li aria-current="page">
                                <div class="flex items-center">
                                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                  </svg>
                                  <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                                </div>
                              </li>
                            </ol>
                          </nav>
                    </div>
                    <div class="px-5 py-2">
                        <div class="grid lg:grid-cols-2 lg:gap-4 grid-cols-1">
                            <div class="py-5 grid grid-cols-2 gap-4">
                                <div class="p-2 h-40 bg-black opacity-40 hover:bg-gray-800 text-white cursor-pointer rounded-sm">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="p-2 h-40 bg-black opacity-40 hover:bg-gray-800 text-white cursor-pointer rounded-sm">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="p-2 h-40 bg-black opacity-40 hover:bg-gray-800 text-white cursor-pointer rounded-sm">Lorem ipsum dolor sit amet consectetur.</div>
                                <div class="p-2 h-40 bg-black opacity-40 hover:bg-gray-800 text-white cursor-pointer rounded-sm">Lorem ipsum dolor sit amet consectetur.</div>
                            </div>
                            <div class="grid">
                                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                    <!-- Carousel wrapper -->
                                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                         <!-- Item 1 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ asset('assets/images/rc/3XGMQeahvOlz.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                        </div>
                                        <!-- Item 2 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ asset('assets/images/rc/8W3nOIXaI7wJ.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                        </div>
                                        <!-- Item 3 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ asset('assets/images/rc/3XGMQeahvOlz.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                        </div>
                                        <!-- Item 4 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ asset('assets/images/rc/3XGMQeahvOlz.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                        </div>
                                        <!-- Item 5 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ asset('assets/images/rc/3XGMQeahvOlz.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                        </div>
                                    </div>
                                    <!-- Slider indicators -->
                                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                                    </div>
                                    <!-- Slider controls -->
                                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                            </svg>
                                            <span class="sr-only">Previous</span>
                                        </span>
                                    </button>
                                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                            </svg>
                                            <span class="sr-only">Next</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
