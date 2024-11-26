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
        <div class="p-2"><span class="text-xl text-gray-600 font-semibold">DAFTAR UNIT KEARSIPAN</span></div>
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
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Unit Kearsipan</span>
                    </div>
                  </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-4 bg-white rounded-sm">
        <div class="mb-3">
            <x-my-default-button class="text-sm" wire:click="tambahUK">Tambah UK</x-my-default-button>
        </div>
        <div class="mb-4">
            <div class="flex justify-between gap-4">
                <div class="md:flex md:gap-4 hidden">
                    <div>
                        <select wire:model="perPage" class="input input-bordered">
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
                    <input wire:model.live.debounce.350ms="search" type="text" class="input input-bordered" placeholder="Cari unit...">
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-hover">
                <thead>
                    <tr>
                        <th style="width: 25px">No.</th>
                        <th>Kode UK</th>
                        <th>Nama User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_uk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->kode_uk }}</td>
                            <td class="text-center">{{ $item->nama_unit }}</td>
                            <td class="md:flex md:justify-center gap-1">
                                <x-my-warning-button wire:click="editUK({{ $item->id }})" data-tooltip-target="tooltipEdit({{ $item->id }})" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></x-my-warning-button>
                                    <div id="tooltipEdit({{ $item->id }})" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Edit
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                <x-my-danger-button wire:click="hapusUK({{ $item->id }})" class="text-xs" data-tooltip-target="tooltipHapus({{ $item->id }})"><i class="fa fa-trash-can"></i></x-my-danger-button>
                                    <div id="tooltipHapus({{ $item->id }})" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Hapus
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $data_uk->links() }}
        </div>
    </div>

    <!-- Modal tambah UK -->
    <x-modal name="modal-tambah-uk" maxWidth="2xl" focusable>
        <div class="p-3 flex justify-center bg-sky-700">
            <div class="text-xl font-semibold text-white">TAMBAH UNIT KEARSIPAN</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formTambahUK">
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Kode UK <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="kode_uk" class="input input-bordered">
                        @error('kode_uk')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-6">
                    <div class="w-1/4 flex items-center">Nama UK <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="nama_unit" class="input input-bordered">
                        @error('nama_unit')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <span class="text-red-500">* Wajib diisi</span>
                    </div>
                    <div class="flex gap-2 justify-end">
                        <x-my-warning-button wire:click="closeModalTambahUK">Tutup</x-my-warning-button>
                        <x-my-default-button type="submit">Simpan</x-my-default-button>
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal tambah UK -->

    <!-- Modal Edit UK -->
    <x-modal name="modal-edit-uk" maxWidth="2xl" focusable>
        <div class="p-3 flex justify-center bg-sky-700">
            <div class="text-xl font-semibold text-white">EDIT UNIT KEARSIPAN</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formEditUK">
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Kode UK <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="kode_uk" class="input input-bordered">
                        @error('kode_uk')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-6">
                    <div class="w-1/4 flex items-center">Nama UK <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="nama_unit" class="input input-bordered">
                        @error('nama_unit')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <span class="text-red-500">* Wajib diisi</span>
                    </div>
                    <div class="flex gap-2 justify-end">
                        <x-my-warning-button wire:click="closeModalEditUK">Tutup</x-my-warning-button>
                        <x-my-default-button type="submit">Simpan</x-my-default-button>
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal edit UK -->

    <!-- Modal hapus uk -->
    <x-modal name="modal-hapus-uk" max-width="lg" focusable>
        <div class="p-3 flex justify-center bg-red-700">
            <div class="text-xl font-semibold text-white">HAPUS UNIT KEARSIPAN</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formHapusUK">
                <div class="text-xl font-semibold mb-3 text-center">Konfirmasi!!</div>
                <div class="text-center mb-6">Anda yakin akan menghapus unit ini?</div>
                <input type="text" wire:model="id_uk" class="hidden">
                <div class="flex justify-end gap-2">
                    <x-my-warning-button class="btn-sm" wire:click.prevent="closeModalHapusUK">Close</x-my-warning-button>
                    <x-my-danger-button class="btn-sm" type="submit">Submit</x-my-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal hapus uk -->

</div>
