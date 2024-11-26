<div>
    <div wire:loading wire:target="formInput" class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="flex justify-between px-4">
        <div class="p-2"><span class="text-xl text-gray-600 font-semibold">INPUT BERKAS</span></div>
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
                  <li>
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Input Berkas</a>
                    </div>
                  </li>
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Form</span>
                    </div>
                  </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-5 bg-white rounded-sm">
        <form wire:submit.prevent="formInput">
            <div class="md:flex md:gap-10 block mb-3">
                <div class="md:w-1/2 w-full">
                    <div class="mb-3 w-full">
                        <label  class="label label-sm">Nomor Berkas</label>
                        <input wire:model="no_berkas" type="text" class="input input-bordered" readonly/>
                        @error('no_berkas')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <label  class="label label-sm">Tahun <span class="text-red-500">*</span></label>
                        <input wire:model="tahun" type="text" class="input input-bordered"/>
                        @error('tahun')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="label label-sm">Uraian Informasi Berkas <span class="text-red-500">*</span></label>
                        <textarea wire:model="uraian_berkas" cols="30" rows="5" class="input input-bordered"></textarea>
                        @error('uraian_berkas')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:w-1/2 w-full">
                    <div class="mb-3 w-full">
                        <label  class="label label-sm">Unit Pengolah <span class="text-red-500">*</span></label>
                        <select wire:model="unit_pengolah" type="text" class="input input-bordered">
                            <option value="">--Pilih Unit--</option>
                            @foreach ($data_unit as $item)
                                <option value="{{ $item->kode_unit }}">{{ $item->nama_unit }}</option>
                            @endforeach
                        </select>
                        @error('unit_pengolah')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative mb-3 w-full" x-data="selectConfigs()"  @click.away="close()">
                        <div class="flex gap-2">
                            <label class="label label-sm">Kode Klasifikasi <span class="text-red-500">*</span></label>
                            <div wire:loading wire:target="kode_klas">
                                <div role="status">
                                    <svg class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <input
                            wire:model.live.debounce.350ms="kode_klas"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            @mousedown="open()"
                            @keyup.tab.prevent="open()"
                            @keydown.enter.stop.prevent="selectOption()"
                            @keydown.arrow-up.prevent="focusPrevOption()"
                            @keydown.arrow-down.prevent="focusNextOption()"
                            type="text"
                            class="input input-bordered"
                            placeholder="Cari kode klasifikasi"
                            />
                            @if (!empty($search_klas))
                                @if(!empty($kode_klas))
                                    <div class="absolute w-full max-h-48 overflow-y-auto" x-show="isOpen()">
                                        @if($klasifikasi->isNotEmpty())
                                            @foreach ($klasifikasi as $index => $item)
                                                <div x-on:click="onOptionClick({{ $item->id }})" :key="{{ $index }}" class="px-3 py-2 border text-sm border-gray-300 bg-white focus:bg-gray-100 hover:bg-gray-100 cursor-pointer dark:text-gray-800 rounded-sm shadow-sm">{{ $item->kode .' - '. $item->fungsi }}</div>
                                            @endforeach
                                        @else
                                            <div class="px-3 py-2 border border-gray-300 bg-gray-100 dark:text-gray-800" style="cursor: default !important">Data tidak ditemukan..</div>
                                        @endif
                                    </div>
                                @endif
                            @endif
                        @error('kode_klas')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <label class="label label-sm">Klasifikasi/Fungsi <span class="text-red-500">*</span></label>
                        <input wire:model="fungsi" type="text" class="input input-bordered" readonly/>
                        @error('fungsi')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <label  class="label label-sm">Jenis Arsip <span class="text-red-500">*</span></label>
                        <select wire:model="jenis_arsip" class="input input-bordered">
                            <option value="umum">Arsip Umum</option>
                            <option value="vital">Arsip Vital</option>
                            <option value="terjaga">Arsip Terjaga</option>
                        </select>
                        @error('jenis_arsip')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="md:flex md:gap-10 block mb-3">
                <div class="md:w-1/2 w-full">
                    <div class="mb-3">
                        <h4 class="text-lg font-semibold text-amber-600">Lokasi Simpan Sementara</h4>
                    </div>
                    <div class="mb-3 flex gap-4">
                        <div class="md:w-5/12 w-full mb-2">
                            <label for="" class="label label-sm">Folder Sementara</label>
                            <input wire:model="folder_awal" type="text" class="input input-bordered"/>
                        </div>
                        <div class="hidden md:flex md:w-2/12 justify-center items-center">
                            <span class="text-sm">atau</span>
                        </div>
                        <div class="md:w-5/12 w-full mb-2">
                            <label for="" class="label label-sm">Boks Sementara</label>
                            <input wire:model="boks_awal" type="text" class="input input-bordered"/>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 w-full">
                    <div class="mb-3">
                        <h4 class="text-lg font-semibold text-amber-600">Lokasi Simpan Definitif</h4>
                    </div>
                    <div class="flex gap-4">
                        <div class="md:w-1/4 w-full mb-2">
                            <div class="flex gap-2">
                                <label for="" class="label label-sm">Lokasi RC</label>
                                <div wire:loading wire:target="lokasi_rc">
                                    <div role="status">
                                        <svg class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <select wire:model.live="lokasi_rc" class="input input-bordered">
                                <option value="">--Pilih RC--</option>
                                @foreach ($data_rc as $item)
                                    <option value="{{ $item->kode_rc }}">{{ $item->nama_rc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/4 w-full mb-2">
                            <div class="flex gap-2">
                                <label for="" class="label label-sm">Ruangan</label>
                                <div wire:loading wire:target="lokasi_rc, ruang, rak">
                                    <div role="status">
                                        <svg class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <select wire:model.live="ruang" class="input input-bordered">
                                <option value="">--Pilih Ruang--</option>
                                @foreach ($this->ruangan as $item)
                                    <option value="{{ $item->kode_ruang }}">{{ $item->nama_ruang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/4 w-full mb-2">
                            <div class="flex gap-2">
                                <label for="" class="label label-sm">Rak</label>
                                <div wire:loading wire:target="lokasi_rc, ruang, rak">
                                    <div role="status">
                                        <svg class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <select wire:model="rak" class="input input-bordered">
                                <option value="">--Pilih Rak--</option>
                                @foreach ($this->rakArsip as $item)
                                    <option value="{{ $item->nama_rak }}">{{ $item->nama_rak }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/4 w-full mb-2">
                            <label for="" class="label label-sm">Boks</label>
                            <input wire:model="boks" type="text" class="input input-bordered"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-2">
                <x-my-default-button class="text-sm" type="submit">Simpan</x-my-default-button>
                <x-my-danger-button class="text-sm" wire:click="resetForm">Reset Form</x-my-danger-button>
            </div>
        </form>

        <script>
            function selectConfigs() {
                return {
                    show: false,
                    close() {
                    this.show = false;
                    },
                    open() {
                    this.show = true;
                    },
                    toggle() {
                    if (this.show) {
                        this.close();
                    }
                    else {
                        this.open()
                    }
                    },
                    isOpen() { return this.show === true },
                    onOptionClick(id){
                        this.$wire.selectedKoklas(id)
                        this.close();
                    }
                }
            }
        </script>

    </div>
</div>
