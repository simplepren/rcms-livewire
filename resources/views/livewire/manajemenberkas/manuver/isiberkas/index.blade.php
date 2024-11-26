<div>
    <div wire:loading wire:target="gotoPage, closeModalBerkaskan, perPage, search, berkaskan, formBerkaskan, no_berkas, formHapusIsiBerkas, hapus, editBerkas, closeModalHapusArsip" class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="flex justify-between px-4">
        <div class="p-2"><span class="text-xl text-gray-600 font-semibold">MANUVER ISI BERKAS</span></div>
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
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Manuver Isi Berkas</span>
                    </div>
                  </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-4 bg-white rounded-sm">
        <div class="my-4">
            <div class="flex gap-2 mb-4">
                @if ($selectedIds)
                    <x-my-default-button wire:click="berkaskan" class="text-sm">
                        <span class="ms-1">Berkaskan</span>
                    </x-my-default-button>
                @else
                    <x-my-disabled-button class="text-sm cursor-not-allowed">Berkaskan</x-my-disabled-button>
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
            <div class="flex justify-between">
                <div class="md:flex md:gap-3 hidden">
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
                <div class="md:w-1/4 w-full">
                    <input wire:model.live.debounce.350ms="search" type="text" class="input input-bordered" placeholder="Cari arsip..." wire:model="search">
                </div>
            </div>
        </div>
        <div class="overflow-x-auto mt-2">
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
                        <th>Koklas</th>
                        <th>No. Registrasi</th>
                        <th>Uraian Isi Berkas</th>
                        <th>Tgl. Penciptaan</th>
                        <th>Jumlah</th>
                        <th>Folder Smt</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_arsip->items() as $item)
                        <tr wire:key="row-{{ $item->id }}">
                            <td>
                                <input type="checkbox" wire:model.live="selectedIds" value="{{ $item->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </td>
                            <td>{{ $item->kode_klas }}</td>
                            <td>{{ $item->no_registrasi }}</td>
                            <td>{{ $item->uraian_isi_berkas }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">{{ $item->folder_smt }}</td>
                            <td class="flex gap-1 justify-center">
                                <div class="relative">
                                    <x-my-warning-button wire:click="editBerkas({{ $item->id }})" class="peer" aria-describedby="tooltipEdit"><i class="fa fa-pencil"></i></x-my-warning-button>
                                    <div id="tooltipEdit" role="tooltip" class="absolute -translate-y-16 -translate-x-4 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-neutral-900">
                                        Edit
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="relative">
                                    <x-my-danger-button wire:click="hapus({{ $item->id }})" class="peer" aria-describedby="tooltipHapus"><i class="fa fa-trash-can"></i></x-my-danger-button>
                                    <div id="tooltipHapus" role="tooltip" class="absolute -translate-y-16 -translate-x-4 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-neutral-900">
                                        Hapus
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="8">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $data_arsip->links() }}
        </div>

        <!-- Modal Berkaskan-->
        <x-modal name="modal-berkaskan" maxWidth="2xl">
            <div class="p-3 flex justify-center bg-sky-700">
                <div class="text-xl font-semibold text-white">BERKASKAN ARSIP</div>
            </div>
            <div class="px-6 py-4">
                <form wire:submit.prevent="formBerkaskan">
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">No Berkas</div>
                        <div class="w-3/4">
                            <div class="relative mb-3 w-full" x-data="selectConfigs()"  @click.away="close()">
                                <input
                                    wire:model.live.debounce.350ms="no_berkas"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    @mousedown="open()"
                                    @keyup.tab.prevent="open()"
                                    @keydown.enter.stop.prevent="selectOption()"
                                    @keydown.arrow-up.prevent="focusPrevOption()"
                                    @keydown.arrow-down.prevent="focusNextOption()"
                                    type="text"
                                    class="input input-bordered w-full"
                                    placeholder="Cari berkas"
                                    />
                                    @if (!empty($search_berkas))
                                        @if(!empty($no_berkas))
                                            <div class="absolute w-full max-h-48 overflow-y-auto" x-show="isOpen()">
                                                @if($data_berkas->isNotEmpty())
                                                    @foreach ($data_berkas as $index => $item)
                                                        <div x-on:click="selectedBerkas({{ $item->id }})" :key="{{ $index }}" class="px-3 py-2 border text-sm border-gray-300 bg-white focus:bg-gray-100 hover:bg-gray-100 cursor-pointer dark:text-gray-800 rounded-sm shadow-sm">{{ $item->no_berkas .' - '. $item->uraian_berkas }}</div>
                                                    @endforeach
                                                @else
                                                    <div class="px-3 py-2 border border-gray-300 bg-gray-100 dark:text-gray-800" style="cursor: default !important">Data tidak ditemukan..</div>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Uraian Berkas</div>
                        <div class="w-3/4">
                            <input type="text" wire:model="uraian_berkas" class="input input-bordered" readonly>
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Tahun</div>
                        <div class="w-3/4">
                            <input type="text" wire:model="tahun" class="input input-bordered" readonly>
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Unit Pengolah</div>
                        <div class="w-3/4">
                            <input type="text" wire:model="unit_pengolah" class="input input-bordered" readonly>
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Kode Klasifikasi</div>
                        <div class="w-3/4">
                            <input type="text" wire:model="klasifikasi" class="input input-bordered" readonly>
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Jenis Arsip</div>
                        <div class="w-3/4">
                            <input type="text" wire:model="jenis_arsip" class="input input-bordered" readonly>
                        </div>
                    </div>
                    <div class="flex w-full mb-2">
                        <div class="w-1/4 flex items-center">Folder</div>
                        <div class="w-3/4">
                            <input type="text" wire:model="folder" class="input input-bordered" readonly>
                        </div>
                    </div>
                    <div class="flex gap-2 justify-end">
                        <x-my-warning-button wire:click="closeModalBerkaskan">Tutup</x-my-warning-button>
                        <x-my-default-button type="submit">Simpan</x-my-default-button>
                    </div>
                </form>
            </div>
        </x-modal>
        <!-- Modal Berkaskan-->

        <!-- Modal hapus isi berkas -->
        <x-modal name="modal-hapus-arsip" max-width="lg" focusable>
            <div class="p-3 flex justify-center bg-red-700">
                <div class="text-xl font-semibold text-white">HAPUS ISI BERKAS</div>
            </div>
            <div class="px-6 py-4">
                <form wire:submit.prevent="formHapusIsiBerkas">
                    <div class="text-xl font-semibold mb-3 text-center">Konfirmasi!!</div>
                    <div class="text-center mb-6">Anda yakin akan menghapus arsip ini?</div>
                    <input type="hidden" wire:model="id_arsip">
                    <div class="flex justify-end gap-2">
                        <x-my-warning-button class="btn-sm" wire:click.prevent="closeModalHapusArsip">Close</x-my-warning-button>
                        <x-my-danger-button type="submit" class="btn-sm">Submit</x-my-danger-button>
                    </div>
                </form>
            </div>
        </x-modal>
        <!-- Modal hapus isi berkas -->

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
                    selectedBerkas(id){
                        this.$wire.selectedBerkas(id)
                        this.close();
                    }
                }
            }
        </script>

    </div>
</div>
