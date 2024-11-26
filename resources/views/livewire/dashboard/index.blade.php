<div>
    <div wire:loading wire:target.except="no_berkas" class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="flex justify-between px-4">
        <div class="p-2"><span class="text-xl text-gray-600 font-semibold">DASHBOARD</span></div>
        <div class="p-2 md:block hidden">
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
                </ol>
            </nav>
        </div>
    </div>
    <div class="w-full space-y-2 md:space-y-0 md:grid md:grid-cols-4 md:gap-4 mb-3">
        <div class="p-4 h-28 bg-white rounded-md border-t-2 border-sky-700">
            <div class="flex justify-between">
                <div>
                    <div class="mb-4 text-xl font-semibold text-gray-700">Jumlah Berkas</div>
                    <div class="text-3xl font-semibold text-sky-800">{{ $jml_berkas }}</div>
                </div>
                <div class="relative w-20 h-20 bg-emerald-500 rounded-full flex justify-center items-center">
                    <div class="absolute">
                        <svg width="40px" height="40px" viewBox="0 0 48.00 48.00" id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000" stroke-width="2.4"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;}</style></defs><path class="cls-1" d="M10.35,4.5a2,2,0,0,0-1.95,2v35.1a2,2,0,0,0,1.95,2h27.3a2,2,0,0,0,2-2V14.49h-8a2,2,0,0,1-1.95-2v-8Z"></path><line class="cls-1" x1="29.61" y1="4.5" x2="39.6" y2="14.49"></line><line class="cls-1" x1="15.84" y1="22.97" x2="32.16" y2="22.97"></line><line class="cls-1" x1="15.84" y1="35.07" x2="32.16" y2="35.07"></line><line class="cls-1" x1="15.84" y1="29.02" x2="32.16" y2="29.02"></line></g></svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 h-28 bg-white rounded-md border-t-2 border-sky-700">
            <div class="flex justify-between">
                <div>
                    <div class="mb-4 text-xl font-semibold text-gray-700">Berkas Dipinjam</div>
                    <div class="text-3xl font-semibold text-sky-800">{{ $jml_peminjaman }}</div>
                </div>
                <div class="relative w-20 h-20 bg-amber-500 rounded-full flex justify-center items-center">
                    <div class="absolute">
                        <svg width="40px" height="40px" viewBox="-3.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff" stroke="#ffffff" stroke-width="0.8"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="icomoon-ignore"> </g> <path d="M6.294 14.164h12.588v1.049h-12.588v-1.049z" fill="#ffffff"> </path> <path d="M6.294 18.36h12.588v1.049h-12.588v-1.049z" fill="#ffffff"> </path> <path d="M6.294 22.557h8.392v1.049h-8.392v-1.049z" fill="#ffffff"> </path> <path d="M15.688 3.674c-0.25-1.488-1.541-2.623-3.1-2.623s-2.85 1.135-3.1 2.623h-9.489v27.275h25.176v-27.275h-9.488zM10.49 6.082v-1.884c0-1.157 0.941-2.098 2.098-2.098s2.098 0.941 2.098 2.098v1.884l0.531 0.302c1.030 0.586 1.82 1.477 2.273 2.535h-9.803c0.453-1.058 1.243-1.949 2.273-2.535l0.53-0.302zM24.128 29.9h-23.078v-25.177h8.392v0.749c-1.638 0.932-2.824 2.566-3.147 4.496h12.588c-0.322-1.93-1.509-3.563-3.147-4.496v-0.749h8.392v25.177z" fill="#ffffff"> </path> </g></svg>                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 h-28 bg-white rounded-md border-t-2 border-sky-700">
            <div class="flex justify-between">
                <div>
                    <div class="mb-4 text-xl font-semibold text-gray-700">Suhu</div>
                    <div class="text-3xl font-semibold text-sky-800">
                        {{-- {{ $weather['hourly']['temperature_2m'][$jam] . ' °C' }} --}}
                        26.1 °C
                    </div>
                </div>
                <div class="relative w-20 h-20 bg-blue-500 rounded-full flex justify-center items-center">
                    <div class="absolute">
                        <svg fill="#ffffff" width="40px" height="40px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>temperature-quarter</title> <path d="M20.75 6.008c0-6.246-9.501-6.248-9.5 0v13.238c-1.235 1.224-2 2.921-2 4.796 0 3.728 3.022 6.75 6.75 6.75s6.75-3.022 6.75-6.75c0-1.875-0.765-3.572-2-4.796l-0.001-0zM16 29.25c-2.9-0-5.25-2.351-5.25-5.251 0-1.553 0.674-2.948 1.745-3.909l0.005-0.004 0.006-0.012c0.13-0.122 0.215-0.29 0.231-0.477l0-0.003c0.001-0.014 0.007-0.024 0.008-0.038l0.006-0.029v-13.52c-0.003-0.053-0.005-0.115-0.005-0.178 0-1.704 1.381-3.085 3.085-3.085 0.060 0 0.12 0.002 0.179 0.005l-0.008-0c0.051-0.003 0.11-0.005 0.17-0.005 1.704 0 3.085 1.381 3.085 3.085 0 0.063-0.002 0.125-0.006 0.186l0-0.008v13.52l0.006 0.029 0.007 0.036c0.015 0.191 0.101 0.36 0.231 0.482l0 0 0.006 0.012c1.076 0.966 1.75 2.361 1.75 3.913 0 2.9-2.35 5.25-5.25 5.251h-0zM16.75 21.367v-3.765c0-0.414-0.336-0.75-0.75-0.75s-0.75 0.336-0.75 0.75v0 3.765c-1.164 0.338-2 1.394-2 2.646 0 1.519 1.231 2.75 2.75 2.75s2.75-1.231 2.75-2.75c0-1.252-0.836-2.308-1.981-2.641l-0.019-0.005zM26.5 2.25c-1.795 0-3.25 1.455-3.25 3.25s1.455 3.25 3.25 3.25c1.795 0 3.25-1.455 3.25-3.25v0c-0.002-1.794-1.456-3.248-3.25-3.25h-0zM26.5 7.25c-0.966 0-1.75-0.784-1.75-1.75s0.784-1.75 1.75-1.75c0.966 0 1.75 0.784 1.75 1.75v0c-0.001 0.966-0.784 1.749-1.75 1.75h-0z"></path> </g></svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 h-28 bg-white rounded-md border-t-2 border-sky-700">
            <div class="flex justify-between">
                <div>
                    <div class="mb-4 text-xl font-semibold text-gray-700">Kelembaban</div>
                    <div class="text-3xl font-semibold text-sky-800">
                        61.2 %
                    </div>
                </div>
                <div class="relative w-20 h-20 bg-pink-500 rounded-full flex justify-center items-center">
                    <div class="absolute">
                        <svg fill="#ffffff" width="40px" height="40px" viewBox="0 0 64 64" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#ffffff" stroke-width="1.28"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="cloudy_sunny"></g> <g id="bright"></g> <g id="cloudy"></g> <g id="high_rainfall"></g> <g id="windy"></g> <g id="rain_with_thunder"></g> <g id="clear_night"></g> <g id="cloudy_night"></g> <g id="moon"></g> <g id="sun"></g> <g id="rainy_night"></g> <g id="windy_night"></g> <g id="night_rain_thunder"></g> <g id="windy_rain"></g> <g id="temperature"></g> <g id="humidity"> <g> <path d="M49.7,35.9C47.3,21.2,29.5,4,28.7,3.3c-0.4-0.4-1-0.4-1.4,0C26.4,4.1,6,23.7,6,39c0,12.1,9.9,22,22,22 c3.4,0,6.7-0.8,9.7-2.3c2.1,1.4,4.6,2.3,7.3,2.3c7.2,0,13-5.8,13-13C58,42.5,54.6,37.8,49.7,35.9z M28,59C17,59,8,50,8,39 C8,26.1,24.4,9,28,5.4C31.3,8.7,45,23,47.6,35.3C46.7,35.1,45.9,35,45,35c-7.2,0-13,5.8-13,13c0,3.7,1.5,7,4,9.3 C33.5,58.4,30.8,59,28,59z M45,59c-6.1,0-11-4.9-11-11s4.9-11,11-11s11,4.9,11,11S51.1,59,45,59z"></path> <path d="M28,54c-8.3,0-15-6.7-15-15c0-0.6-0.4-1-1-1s-1,0.4-1,1c0,9.4,7.6,17,17,17c0.6,0,1-0.4,1-1S28.6,54,28,54z"></path> <path d="M48.4,40.1c-0.5-0.2-1.1,0-1.3,0.5l-6,14c-0.2,0.5,0,1.1,0.5,1.3C41.7,56,41.9,56,42,56c0.4,0,0.8-0.2,0.9-0.6l6-14 C49.1,40.9,48.9,40.3,48.4,40.1z"></path> <path d="M44,44c0-1.7-1.3-3-3-3s-3,1.3-3,3s1.3,3,3,3S44,45.7,44,44z M40,44c0-0.6,0.4-1,1-1s1,0.4,1,1s-0.4,1-1,1S40,44.6,40,44z "></path> <path d="M49,49c-1.7,0-3,1.3-3,3s1.3,3,3,3s3-1.3,3-3S50.7,49,49,49z M49,53c-0.6,0-1-0.4-1-1s0.4-1,1-1s1,0.4,1,1S49.6,53,49,53z "></path> </g> </g> <g id="air_pressure"></g> <g id="low_rainfall"></g> <g id="moderate_rainfall"></g> <g id="Sunset"></g> </g></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:grid md:grid-cols-3 md:gap-2">
        <div class="p-4 bg-white rounded-sm">
            <div class="mb-5">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Panduan Penggunaan Aplikasi</h2>
                <div class="mb-2">
                    <p class="text-sm text-gray-500">Lakukan langkah-langkah berikut ini sebelum Anda melakukan input berkas/arsip :</p>
                </div>
                <ul class="max-w-xl space-y-1 text-gray-800 list-inside dark:text-gray-400">
                    <li class="flex items-center">
                        @if($esign)
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @else
                            <svg class="w-3.5 h-3.5 me-2 text-gray-400 dark:text-gray-300 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @endif
                         Lakukan pengambilan sampel tanda tangan melalui menu Profile
                    </li>
                    <li class="flex items-center">
                        @if($rc->count() > 0)
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @else
                            <svg class="w-3.5 h-3.5 me-2 text-gray-400 dark:text-gray-300 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @endif
                         Lakukan penambahan data Record Center
                    </li>
                    <li class="flex items-center">
                        @if($ruangan->count() > 0)
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @else
                            <svg class="w-3.5 h-3.5 me-2 text-gray-400 dark:text-gray-300 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @endif
                         Lakukan penambahan data Ruangan
                    </li>
                    <li class="flex items-center">
                        @if($rak->count() > 0)
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @else
                            <svg class="w-3.5 h-3.5 me-2 text-gray-400 dark:text-gray-300 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                        @endif
                         Lakukan penambahan data Rak
                    </li>
                </ul>
                <div class="mt-3 w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{ $progress }}%"> {{ $progress }}%</div>
                </div>
            </div>
        </div>
        <div class="p-4 bg-white rounded-md">
            <div class="mb-5">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Scan Boks</h2>
                <div class="mb-3">
                    <div>Gunakan menu berikut untuk melihat isi berkas yang ada di dalam boks arsip</div>
                </div>
                <div class="mt-3 flex justify-center">
                    {{-- <x-my-default-button wire:click="scanBerkas" class="text-sm">Scan Boks</x-my-default-button> --}}
                    <button wire:click="scanBerkas" class="bg-sky-800 text-white text-2xl font-bold w-32 h-32 rounded-full hover:bg-sky-700 hover:rotate-180 duration-300">SCAN</button>
                </div>
            </div>
        </div>
        <div class="p-4 bg-white rounded-md">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Denah Rak</h2>
        </div>
    </div>

    <script>
        document.addEventListener('redirect', event => {
            window.open(event.detail[0].url, '_blank');
        })
    </script>
</div>
