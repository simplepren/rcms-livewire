<div>
    <div wire:loading class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="mb-5">
        <x-my-default-button class="text-sm" wire:click="tambah">Tambah RC</x-my-default-button>
    </div>
    <div class="mb-5 py-5 overflow-x-auto overflow-y-hidden" style="height: 21rem">
        <div class="flex gap-4">
            @forelse($data_rc as $rc)
                <div class="relative hover:scale-105 duration-300">
                    <img class="rounded-xlh-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0" src="@if($rc->foto != null) {{ asset($rc->foto) }} @else {{ asset('assets/images/rc/nopic-1.png') }} @endif" alt="">
                    <div class="absolute bottom-0 bg-black/60 w-full h-32 cursor-pointer rounded-b-lg"></div>
                    <div class="px-4 absolute top-40 text-white">
                        <div class="text-xl font-semibold">{{ $rc->nama_rc }}</div>
                        <div class="border-b-2 mb-1 border-yellow-300"></div>
                        <div class="flex gap-2 mb-2">
                            <div class="text-sm flex justify-center">
                                <svg class="w-6 h-6 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="text-sm w-72 flex items-center">{{ $rc->alamat }}</div>
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <div>{{ $rc->telp }}</div>
                        </div>
                    </div>
                    <div class="absolute bottom-3 right-3">
                        <div class="flex gap-1">
                            <x-my-warning-button wire:click="edit({{ $rc->id }})" data-tooltip-target="tooltipEdit({{ $rc->id }})" class="text-xs"><i class="fa fa-pencil"></i></x-my-warning-button>
                                <div id="tooltipEdit({{ $rc->id }})" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Edit
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            <x-my-danger-button wire:click="hapus({{ $rc->id }})" class="text-xs" data-tooltip-target="tooltipHapus({{ $rc->id }})"><i class="fa fa-trash-can"></i></x-my-danger-button>
                                <div id="tooltipHapus({{ $rc->id }})" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Hapus
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                        </div>
                    </div>
                </div>
            @empty
                <div>Tidak ada data RC</div>
            @endforelse
        </div>
    </div>

    <!-- Modal Tambah RC-->
    <x-modal name="modal-tambah-rc" maxWidth="2xl">
        <div class="p-3 flex justify-center bg-sky-700">
            <div class="text-xl font-semibold text-white">TAMBAH RECORDS CENTER</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formTambah">
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Kode RC <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="kode_rc" class="input input-bordered">
                        @error('kode_rc')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Nama RC <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="nama_rc" class="input input-bordered">
                        @error('nama_rc')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Alamat RC <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="alamat" class="input input-bordered">
                        @error('alamat')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">No. Telp</div>
                    <div class="w-3/4">
                        <input type="text" wire:model="telp" class="input input-bordered">
                        @error('telp')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Kepemilikan</div>
                    <div class="w-3/4">
                        <input type="text" wire:model="kepemilikan" class="input input-bordered">
                        @error('kepemilikan')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Jumlah Lantai</div>
                    <div class="w-3/4">
                        <input type="text" wire:model="jml_lantai" class="input input-bordered">
                        @error('jml_lantai')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Luas (m<sup>2</sup>)</div>
                    <div class="w-3/4">
                        <input type="text" wire:model="luas" class="input input-bordered">
                        @error('luas')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-5">
                    <div class="w-1/4 flex items-center">Foto <span class="text-red-500">**</span></div>
                    <div class="w-3/4"
                        x-data="{ uploading: false, progress: 0 }"
                        x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false"
                        x-on:livewire-upload-cancel="uploading = false"
                        x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <input type="file" accept="image/*" wire:model="foto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700" x-show="uploading">
                            <div class="bg-blue-600 h-1.5 rounded-full dark:bg-blue-500" x-bind:style="{ width: progress + '%' }"></div>
                        </div>
                        @error('foto')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <div class="text-red-500">* Wajib diisi</div>
                        <div class="text-red-500">** Format foto 16:9, resolusi minimal 720P</div>
                    </div>
                    <div class="flex gap-2 justify-end">
                        <x-my-warning-button wire:click="closeModal">Tutup</x-my-warning-button>
                        <x-my-default-button type="submit">Simpan</x-my-default-button>
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal Tambah RC-->

    <!-- Modal Edit RC-->
    <x-modal name="modal-edit-rc" maxWidth="2xl">
        <div class="p-3 flex justify-center bg-sky-700">
            <div class="text-xl font-semibold text-white">EDIT RECORDS CENTER</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formEditRC">
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Kode RC <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="kode_rc" class="input input-bordered" readonly>
                        @error('kode_rc')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Nama RC <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="nama_rc" class="input input-bordered">
                        @error('nama_rc')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Alamat RC <span class="text-red-500"> *</span></div>
                    <div class="w-3/4">
                        <input type="text" wire:model="alamat" class="input input-bordered">
                        @error('alamat')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">No. Telp</div>
                    <div class="w-3/4">
                        <input type="text" wire:model="telp" class="input input-bordered">
                        @error('telp')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Kepemilikan</div>
                    <div class="w-3/4">
                        <input type="text" wire:model="kepemilikan" class="input input-bordered">
                        @error('kepemilikan')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Jumlah Lantai</div>
                    <div class="w-3/4">
                        <input type="text" wire:model="jml_lantai" class="input input-bordered">
                        @error('jml_lantai')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-2">
                    <div class="w-1/4 flex items-center">Luas (m<sup>2</sup>)</div>
                    <div class="w-3/4">
                        <input type="text" wire:model="luas" class="input input-bordered">
                        @error('luas')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full mb-5">
                    <div class="w-1/4 flex items-center">Foto <span class="text-red-500">**</span></div>
                    <div class="w-3/4"
                        x-data="{ uploading: false, progress: 0 }"
                        x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false"
                        x-on:livewire-upload-cancel="uploading = false"
                        x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <input type="file" accept="image/*" wire:model="foto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700" x-show="uploading">
                            <div class="bg-blue-600 h-1.5 rounded-full dark:bg-blue-500" x-bind:style="{ width: progress + '%' }"></div>
                        </div>
                        <div><img class="mt-2 rounded-lg" src="{{ asset($old_foto) }}" alt="" width="50%"></div>
                        @error('foto')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <div class="text-red-500">* Wajib diisi</div>
                        <div class="text-red-500">** Format foto 16:9, resolusi minimal 720P</div>
                    </div>
                    <div class="flex gap-2 justify-end">
                        <x-my-warning-button wire:click="closeModalEditRC">Tutup</x-my-warning-button>
                        <x-my-default-button type="submit">Simpan</x-my-default-button>
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal Edit RC-->

    <!-- Modal Hapus RC-->
    <x-modal name="modal-hapus-rc" maxWidth="lg">
        <div class="p-3 flex justify-center bg-red-700">
            <div class="text-xl font-semibold text-white">HAPUS RC</div>
        </div>
        <div class="px-6 py-4">
            <form wire:submit.prevent="formHapusRC">
                <div class="font-semibold mb-3 text-center">Konfirmasi!!</div>
                <div class="text-center mb-2">Anda yakin akan menghapus Records Center ini?</div>
                <div class="text-center mb-6">Semua data ruangan dan rak akan hilang</div>
                <input type="text" wire:model="id_rc" class="hidden">
                <div class="flex gap-4 justify-end">
                    <x-my-warning-button wire:click="closeModalHapusRC">Close</x-my-warning-button>
                    <x-my-default-button type="submit">Submit</x-my-default-button>
                </div>
            </form>
        </div>
    </x-modal>
    <!-- Modal Hapus RC-->

</div>
