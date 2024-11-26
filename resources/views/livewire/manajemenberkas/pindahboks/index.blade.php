<div>
    <div wire:loading class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="flex justify-between px-4">
        <div class="p-2"><span class="text-xl text-gray-600 font-semibold">PINDAH BOKS</span></div>
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
                      <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Manajemen Berkas</a>
                    </div>
                  </li>
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pindah Boks</span>
                    </div>
                  </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-4 bg-white rounded-sm">
        <div class="mb-5 p-4 rounded-md border border-gray-300">
            <div class="mb-2">Filter Data:</div>
            <div class="mb-2">
                <form wire:submit.prevent="cariBoks" class="block">
                    <div class="mb-5 lg:w-1/2 w-full">
                        <input type="text" placeholder="Cari boks" wire:model="search" class="input input-bordered w-full uppercase">
                    </div>
                    <div>
                        <x-my-default-button class="text-sm" type="submit">Cari</x-my-default-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex gap-3">
            @if ($query)
                @if ($this->data_boks)
                    <div class="p-3 border border-gray-300 rounded-md max-w-52" style="background-color: #b8917e">
                        <div class="mb-1 flex justify-center">
                            <img src="{{ asset('assets/images/logo/kemenkeu.png') }}" alt="" width="50px">
                        </div>
                        <div class="mb-1 text-center text-sm">KEMENTERIAN KEUANGAN</div>
                        <div class="mb-7 text-center text-xs">BADAN PENDIDIKAN DAN PELATIHAN KEUANGAN</div>
                        <div class="mb-7 text-center text-xl font-semibold">
                            {{ $this->data_boks->kode_boks }}
                        </div>
                        <div class="mb-3 flex justify-center px-10">
                            <div class="w-full border border-gray-700 h-12"></div>
                        </div>
                        <div class="flex justify-center">
                            <x-my-default-button class="text-sm" wire:click="pindahBoks">Pindah</x-my-default-button>
                        </div>
                    </div>
                @else
                    <div class="text-red-500">Boks arsip tidak ditemukan</div>
                @endif
            @endif
        </div>

        <!-- Modal Pindah Boks-->
        <x-modal name="modal-pindahkan" maxWidth="2xl">
            <div class="p-3 flex justify-center bg-sky-700">
                <div class="text-xl font-semibold text-white">PINDAHKAN BOKS</div>
            </div>
            <div class="px-6 py-4">
                <form wire:submit.prevent="formPindahkan">
                    <input type="text" class="hidden" wire:model="kode_boks">
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Lokasi RC <span class="text-red-500">&nbsp;*</span></div>
                        <div class="w-3/4">
                            <select wire:model.live="lokasi_rc" class="input input-bordered">
                                <option value="">--Pilih RC--</option>
                                @foreach ($data_rc as $item)
                                    <option value="{{ $item->kode_rc }}">{{ $item->nama_rc }}</option>
                                @endforeach
                            </select>
                            @error('lokasi_rc')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Ruangan <span class="text-red-500">&nbsp;*</span></div>
                        <div class="w-3/4">
                            <select wire:model.live="ruang" class="input input-bordered">
                                <option value="">--Pilih Ruangan--</option>
                                @foreach ($this->ruangan as $item)
                                    <option value="{{ $item->kode_ruang }}">{{ $item->nama_ruang }}</option>
                                @endforeach
                            </select>
                            @error('ruang')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Rak <span class="text-red-500">&nbsp;*</span></div>
                        <div class="w-3/4">
                            <select wire:model="rak" class="input input-bordered">
                                <option value="">--Pilih Rak--</option>
                                @foreach ($this->rakArsip as $item)
                                    <option value="{{ $item->nama_rak }}">{{ $item->nama_rak }}</option>
                                @endforeach
                            </select>
                            @error('rak')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">No. Boks <span class="text-red-500">&nbsp;*</span></div>
                        <div class="w-3/4">
                            <input type="text" wire:model="boks" class="input input-bordered">
                            @error('boks')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-2 justify-end">
                        <x-my-warning-button wire:click="closeModalPindahkan">Tutup</x-my-warning-button>
                        <x-my-default-button type="submit">Simpan</x-my-default-button>
                    </div>
                </form>
            </div>
        </x-modal>
        <!-- Modal Pindah Boks-->

    </div>
</div>
