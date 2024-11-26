<div>
    <div wire:loading wire:target.except="kode_boks" class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="flex justify-between px-4">
        <div class="p-2"><span class="text-xl text-gray-600 font-semibold">CETAK QRCODE</span></div>
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
                      <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Manuver Berkas</a>
                    </div>
                  </li>
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cetak QRCode</span>
                    </div>
                  </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-4 bg-white rounded-sm">
        <div class="mb-3">
            <div class="mb-1 text-lg"><b>Petunjuk:</b> </div>
            <div class="text-gray-700">Klik pada kotak di bawah untuk cetak boks, atau isi filter data apabila ingin melakukan cetak boks kosong</div>
        </div>
        <div class="mb-5">
            <div class="mb-1">Filter Data:</div>
            <div class="grid md:grid-cols-6 gap-4 mb-5">
                <div>
                    <select wire:model.live="lokasi_rc" name="" class="input input-bordered">
                        <option value="">--Lokasi RC--</option>
                        @foreach ($data_rc as $rc)
                            <option value="{{ $rc->kode_rc }}">{{ $rc->nama_rc }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select wire:model.live="ruang" name="" class="input input-bordered">
                        <option value="">--Ruang--</option>
                        @foreach ($this->ruangan as $item)
                            <option value="{{ $item->kode_ruang }}">{{ $item->nama_ruang }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select wire:model.live="rak" name="" class="input input-bordered">
                        <option value="">--Rak--</option>
                        @foreach ($this->rakArsip as $item)
                            <option value="{{ $item->nama_rak }}">{{ $item->nama_rak }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-my-warning-button wire:click="resetFilter">Reset</x-my-warning-button>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="cetakQRCode">
            <div class="mb-3 flex gap-2">
                <div>
                    @if ($kode_boks)
                        <x-my-default-button class="text-sm" type="submit">Cetak</x-my-default-button>
                    @else
                        <x-my-disabled-button class="text-sm cursor-not-allowed">Cetak</x-my-disabled-button>
                    @endif
                </div>
                <div>
                    @if($lokasi_rc && $ruang && $rak)
                        <x-my-default-button class="text-sm" wire:click="cetakBoksKosong">Cetak Boks Kosong</x-my-default-button>
                    @else
                        <x-my-disabled-button class="text-sm cursor-not-allowed">Cetak Boks Kosong</x-my-disabled-button>
                    @endif
                </div>
            </div>
            <div class="overflow-x-auto mb-3">
                <ul class="grid w-full gap-4 md:grid-cols-3 lg:grid-cols-6">
                    @forelse ($data_berkas as $key => $berkas)
                        <li wire:key="{{ $key }}">
                            <input type="checkbox" wire:model.live="kode_boks" id="boks-{{ $key }}" value="{{ $berkas->kode_boks }}" class="hidden peer">
                            <label for="boks-{{ $key }}" class="inline-flex items-center justify-center w-full px-5 py-7 text-sky-700 bg-white border-2 border-gray-400 rounded-lg cursor-pointer dark:hover:text-sky-300 dark:border-gray-700 peer-checked:bg-sky-700 peer-checked:text-white hover:text-sky-800 dark:peer-checked:text-gray-300 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex justify-center">
                                    <div class="w-full text-xl font-semibold">{{ $berkas->kode_boks }}</div>
                                </div>
                            </label>
                        </li>
                    @empty
                        <li>
                            <div class="flex justify-center">
                                <div class="w-full text-gray-600">Data Tidak Tersedia</div>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </form>
        <div class="mt-3">
            {{ $data_berkas->links() }}
        </div>
    </div>

    <!-- Modal Cetak Boks Kosong-->
    <x-modal name="modal-cetak-boks-kosong" maxWidth="xl">
        <div class="p-3 flex justify-center bg-sky-700">
            <div class="text-xl font-semibold text-white">CETAK BOKS KOSONG</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formCetakBoksKosong">
                <div class="mb-2 flex">
                    <div class="w-1/4 flex items-center">Kode Klas <span class="text-red-500">&nbsp;*</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="kode_klas" class="input input-bordered" placeholder="Isikan 2 karakter awal, misal: KP, PL, KU dll.."/>
                        @error('kode_klas')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-5 flex">
                    <div class="w-1/4 flex items-center">Nomor Boks <span class="text-red-500">&nbsp;*</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="boks" class="input input-bordered" placeholder="Bila banyak, pisahkan dengan koma"/>
                        @error('boks')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-2 justify-between">
                    <div>
                        <span class="text-red-500">* Wajib diisi</span>
                    </div>
                    <div class="flex gap-2 justify-end">
                        <x-my-warning-button wire:click="closeModalCetakBoks">Tutup</x-my-warning-button>
                        <x-my-default-button type="submit">Cetak</x-my-default-button>
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal Cetak Boks Kosong-->
</div>
