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
        <div class="p-2"><span class="text-xl text-gray-600 font-semibold">DAFTAR BERKAS</span></div>
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
                      <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Berkas</a>
                    </div>
                  </li>
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Daftar Berkas</span>
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
                <div class="flex gap-4 mb-3">
                    <div class="">
                        <select wire:model.live="filter_unit_pengolah" class="input input-bordered">
                            <option value="">--Pilih Unit--</option>
                            @foreach ($data_unit as $item)
                                <option value="{{ $item->kode_unit }}">{{ $item->nama_unit }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="">
                        <select wire:model.live="filter_kode_klas" class="input input-bordered">
                            <option value="">--Kode Klasifikasi--</option>
                            @foreach ($data_koklas as $item)
                                <option value="{{ $item->kode_klas }}">{{ $item->kode_klas }} - {{ $item->fungsi}}></option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="">
                        <select wire:model.live="filter_lokasi_rc" class="input input-bordered">
                            <option value="">--RC--</option>
                            @foreach($data_rc as $item)
                                <option value="{{ $item->kode_rc }}">{{ $item->nama_rc }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <select wire:model.live="filter_ruang" class="input input-bordered">
                            <option value="">--Ruangan--</option>
                            @foreach ($this->ruangan as $item)
                                <option value="{{ $item->kode_ruang }}">{{ $item->nama_ruang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <select wire:model.live="filter_rak" class="input input-bordered">
                            <option value="">--Rak--</option>
                            @foreach ($this->rakArsip as $item)
                                <option value="{{ $item->nama_rak }}">{{ $item->nama_rak }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <select wire:model.live="filter_retensi" class="input input-bordered">
                            <option value="">--Retensi--</option>
                            <option value="Inaktif">Inaktif</option>
                            <option value="Usul Musnah">Lewat Inaktif</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <input wire:model.live.debounce.350ms="filter_tahun_awal" type="text" class="input input-bordered" placeholder="tahun awal" style="width: 110px !important">
                        <div class="flex items-center text-gray-500">s.d</div>
                        <input wire:model.live.debounce.350ms="filter_tahun_akhir" type="text" class="input input-bordered" placeholder="tahun akhir" style="width: 110px !important">
                    </div>
                </div>
                <div class="flex gap-3">
                    <x-my-default-button class="text-sm" wire:click="downloadFile">Export Excel</x-my-default-button>
                    <x-my-warning-button class="text-sm" wire:click="resetFilter">Reset Filter</x-my-warning-button>
                    <div class="relative">
                        <x-my-info-button class="peer" aria-describedby="tooltipExample{{ $item->id }}"><i class="fa fa-eye"></i></x-my-info-button>
                        <div id="tooltipExample" class="absolute -top-9 left-1/2 -translate-x-1/2 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-neutral-900" role="tooltip">Tooltip top</div>
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
                        <th style="width: 25px">No. Berkas</th>
                        <th>Uraian Berkas</th>
                        <th>Unit Pengolah</th>
                        <th>Kode Klasifikasi</th>
                        <th>Tahun</th>
                        <th>Lokasi</th>
                        <th>Jml Arsip</th>
                        <th>Ret</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_berkas as $item)
                        <tr>
                            <td>{{ $item->no_berkas }}</td>
                            <td>{{ $item->uraian_berkas }}</td>
                            <td class="text-center">{{ $item->unit->nama_unit }}</td>
                            <td class="text-center">{{ $item->kode_klas.' - '.$item->fungsi }}</td>
                            <td class="text-center">{{ $item->tahun }}</td>
                            <td class="text-center">{{ $item->kode_boks }}</td>
                            <td class="text-center">{{ $item->itemBerkas->count() }}</td>
                            <td class="text-center">
                                @if($item->retensi == 'Inaktif')
                                    <span class="flex w-3 h-3 bg-yellow-300 rounded-full"></span>
                                @elseif($item->retensi == 'Usul Musnah')
                                    <span class="flex w-3 h-3 bg-red-500 rounded-full"></span>
                                @endif
                            </td>
                            <td class="md:flex md:justify-center gap-1">
                                <div class="relative">
                                    <x-my-info-button wire:click="details({{ $item->id }})" class="peer" aria-describedby="tooltipDetail"><i class="fa fa-eye"></i></x-my-info-button>
                                    <div id="tooltipDetail" role="tooltip" class="absolute -translate-y-16 -translate-x-4 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-neutral-900">
                                        Detail
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
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
                                <div>
                                    <x-my-success-button wire:click="isiBerkas({{ $item->id }})" class="peer" aria-describedby="isiBerkas"><i class="fa-regular fa-file-lines"></i></x-my-success-button>
                                    <div id="isiBerkas" role="tooltip" class="absolute -translate-y-16 -translate-x-4 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-neutral-900">
                                        Lihat Isi Berkas
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mb-6">
            {{ $data_berkas->links() }}
        </div>
        <div class="mb-3">
            <div class="flex gap-3 items-center">
                <span class="flex w-3 h-3 me-3 bg-yellow-300 rounded-full"></span>
                <span class="text-sm">Inaktif</span>
            </div>
            <div class="flex gap-3 items-center">
                <span class="flex w-3 h-3 me-3 bg-red-500 rounded-full"></span>
                <span class="text-sm">Lewat Retensi Inaktif</span>
            </div>
        </div>
    </div>

    <!-- modal detail -->
        <x-modal name="modal-detail" maxWidth="2xl" focusable>
            <div class="p-3 flex justify-center bg-sky-700">
                <div class="text-xl font-semibold text-white">DETAIL BERKAS</div>
            </div>
            <div class="px-6 py-4">
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">No. Berkas</div>
                    <span class="w-2/3 border-none" x-text="$wire.no_berkas"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Uraian. Berkas</div>
                    <span class="w-2/3 border-none" x-text="$wire.uraian_berkas"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Unit Pengolah</div>
                    <span class="w-2/3 border-none" x-text="$wire.unit_pengolah"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Kurun Waktu</div>
                    <span class="w-2/3 border-none" x-text="$wire.kurun_waktu"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Klasifikasi</div>
                    <span class="w-2/3 border-none" x-text="$wire.klasifikasi"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Jenis Arsip</div>
                    <span class="w-2/3 border-none" x-text="$wire.jenis_arsip"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Lokasi Simpan</div>
                    <div class="w-2/3 flex gap-3">
                        <div class="flex border border-gray-200 rounded-md">
                            <div class="px-2 bg-sky-700 rounded-l-md text-white flex items-center">RC</div>
                            <div class="flex items-center px-2">
                                <span x-text="$wire.lokasi_rc"></span>
                            </div>
                        </div>
                        <div class="flex border border-gray-200 rounded-md">
                            <div class="px-2 bg-sky-700 rounded-l-md text-white flex items-center">Ruang</div>
                            <div class="flex items-center px-2">
                                <span x-text="$wire.ruang"></span>
                            </div>
                        </div>
                        <div class="flex border border-gray-200 rounded-md">
                            <div class="px-2 bg-sky-700 rounded-l-md text-white flex items-center">Rak</div>
                            <div class="flex items-center px-2">
                                <span x-text="$wire.rak"></span>
                            </div>
                        </div>
                        <div class="flex border border-gray-200 rounded-md">
                            <div class="px-2 bg-sky-700 rounded-l-md text-white flex items-center">Boks</div>
                            <div class="flex items-center px-2">
                                <span x-text="$wire.boks"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Folder</div>
                    <span class="w-2/3 border-none" x-text="$wire.folder"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Retensi Aktif</div>
                    <span class="w-2/3 border-none" x-text="$wire.aktif"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Retensi Inaktif</div>
                    <span class="w-2/3 border-none" x-text="$wire.inaktif"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Keterangan</div>
                    <span class="w-2/3 border-none" x-text="$wire.ket_musnah"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Klasifikasi Keamanan</div>
                    <span class="w-2/3 border-none" x-text="$wire.keamanan"></span>
                </div>
                <div class="flex w-full mb-1">
                    <div class="w-1/3 flex items-center">Hak Akses</div>
                    <span class="w-2/3 border-none" x-text="$wire.akses"></span>
                </div>
                <div class="flex justify-end mt-4">
                    <x-my-warning-button wire:click="closeModal">Tutup</x-my-warning-button>
                </div>
            </div>
        </x-modal>
    <!-- modal detail -->


    <!-- Modal hapus berkas -->
    <x-modal name="modal-hapus" max-width="lg" focusable>
        <div class="p-3 flex justify-center bg-red-700">
            <div class="text-xl font-semibold text-white">HAPUS BERKAS</div>
        </div>
        <div class="px-6 py-4">
            <div class="text-xl font-semibold mb-3 text-center">Konfirmasi!!</div>
            <div class="text-center mb-2">Anda yakin akan menghapus berkas ini?</div>
            <div class="text-center mb-6">Semua data (termasuk item/isi berkas) akan hilang</div>
            <div class="flex justify-end gap-2">
                <x-my-warning-button class="btn-sm" wire:click.prevent="closeModalHapus">Close</x-my-warning-button>
                <x-my-danger-button class="btn-sm" wire:click.prevent="hapus({{ $id_berkas }})">Submit</x-my-danger-button>
            </div>
        </div>
    </x-modal>
    <!-- Modal hapus berkas -->

    <script>
        function selectYearConfigs(){
            return {
                tahun : [],
                selectAll(){
                    this.tahun = [];
                },
                tahun: [],
                show: false,
                allYears() {
                    this.tahun = ['all'];
                },
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
            }
        }

    </script>
</div>
