<div>
    <div wire:loading wire:target="gotoPage,perPage, search, lokasi_rc, ruang, rak, editBerkas, hapusBerkas, formHapusBerkas, manuverBerkas, closeModalManuver, formManuverBerkas, closeModalManuver, filter_tahun_awal,filter_tahun_akhir, resetFilter, filter_kode_klas" class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="flex justify-between px-4">
        <div class="p-2"><span class="text-xl text-gray-600 font-semibold">MANUVER BERKAS</span></div>
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
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Manuver Berkas</span>
                    </div>
                  </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-4 bg-white rounded-sm">
        <div class="mb-4">
            <div class="mb-4 p-4 lg:block hidden border border-gray-300 rounded-lg">
                <div class="mb-2">
                    <h5 class="text-lg font-semibold">Filter Data</h5>
                </div>
                <div class="flex gap-7 mb-3">
                    <div class="">
                        <select wire:model.live="filter_kode_klas" class="input input-bordered">
                            <option value="">--Kode Klasifikasi--</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <input wire:model.live.debounce.350ms="filter_tahun_awal" type="text" class="input input-bordered" placeholder="tahun awal" style="width: 120px !important">
                        <div class="flex items-center text-gray-500">s.d</div>
                        <input wire:model.live.debounce.350ms="filter_tahun_akhir" type="text" class="input input-bordered" placeholder="tahun akhir" style="width: 120px !important">
                    </div>
                    <div>
                        <x-my-warning-button class="text-sm" wire:click="resetFilter">Reset Filter</x-my-warning-button>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 mb-4">
                @if ($selectedIds)
                    <x-my-default-button wire:click="manuverBerkas" class="text-sm">
                        <span class="ms-1">Manuver ke Boks</span>
                    </x-my-default-button>
                @else
                    <x-my-disabled-button class="text-sm cursor-not-allowed">Manuver ke Boks</x-my-disabled-button>
                @endif
                <div wire:loading wire:target="selectAll,selectedIds" class="flex items-center">
                    <div role="status">
                        <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-between gap-4">
                <div class="md:flex md:gap-4 hidden">
                    <div>
                        <select wire:model.live="perPage" class="input input-bordered">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm">Items display</span>
                    </div>
                </div>
                <div>
                    <input wire:model.live.debounce.350ms="search" type="text" class="input input-bordered" placeholder="Cari berkas...">
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-hover">
                <thead>
                    <tr>
                        <th style="width: 25px">
                            <input
                                type="checkbox"
                                wire:model.live="selectAll"
                                autocomplete="off"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            />
                        </th>
                        <th>Uraian Berkas</th>
                        <th>Kode Klasifikasi</th>
                        <th>Tahun</th>
                        <th>Folder Smt</th>
                        <th>Boks Smt</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_berkas as $item)
                        <tr wire:key="row-{{ $item->id }}">
                            <td>
                                <input type="checkbox" wire:model.live="selectedIds" value="{{ $item->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </td>
                            <td>{{ $item->uraian_berkas }}</td>
                            <td class="text-center">{{ $item->kode_klas }}</td>
                            <td class="text-center">{{ $item->tahun }}</td>
                            <td class="text-center">{{ $item->folder_awal }}</td>
                            <td class="text-center">{{ $item->boks_awal }}</td>
                            <td class="md:flex md:justify-center gap-1">
                                <div class="relative">
                                    <x-my-warning-button wire:click="editBerkas({{ $item->id }})" class="peer" aria-describedby="tooltipEdit"><i class="fa fa-pencil"></i></x-my-warning-button>
                                    <div id="tooltipEdit" role="tooltip" class="absolute -translate-y-16 -translate-x-4 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-neutral-900">
                                        Edit
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="relative">
                                    <x-my-danger-button wire:click="hapusBerkas({{ $item->id }})" class="peer" aria-describedby="tooltipHapus"><i class="fa fa-trash-can"></i></x-my-danger-button>
                                    <div id="tooltipHapus" role="tooltip" class="absolute -translate-y-16 -translate-x-4 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-neutral-900">
                                        Hapus
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $data_berkas->links() }}
        </div>
    </div>

    <!-- Modal Masukkan ke Boks -->
    <x-modal name="modal-manuver-berkas" maxWidth="2xl">
        <div class="p-3 flex justify-center bg-sky-700">
            <div class="text-xl font-semibold text-white">MANUVER BERKAS</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formManuverBerkas">
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
                <div class="flex gap-2 justify-between">
                    <div>
                        <span class="text-red-500">* Wajib diisi</span>
                    </div>
                    <div class="flex gap-2 justify-end">
                        <x-my-warning-button wire:click="closeModalManuver">Tutup</x-my-warning-button>
                        <x-my-default-button type="submit">Simpan</x-my-default-button>
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal Masukkan ke Boks -->

    <!-- Modal hapus berkas -->
    <x-modal name="modal-hapus-berkas" max-width="lg" focusable>
        <div class="p-3 flex justify-center bg-red-700">
            <div class="text-xl font-semibold text-white">HAPUS BERKAS</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formHapusBerkas">
                <div class="text-xl font-semibold mb-3 text-center">Konfirmasi!!</div>
                <div class="text-center mb-2">Anda yakin akan menghapus berkas ini?</div>
                <input type="text" wire:model="id_berkas" class="hidden">
                <div class="text-center mb-6">Semua data (termasuk item/isi berkas) akan hilang</div>
                <div class="flex justify-end gap-2">
                    <x-my-warning-button class="btn-sm" wire:click.prevent="closeModalHapus">Close</x-my-warning-button>
                    <x-my-danger-button class="btn-sm" type="submit">Submit</x-my-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal hapus berkas -->

</div>
