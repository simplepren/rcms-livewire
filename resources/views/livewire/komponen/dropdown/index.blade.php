<div>
    <div class="relative mb-3 w-full" x-data="selectConfigs()"  @click.away="close()">
        <div class="flex gap-2">
            {{-- <label class="label label-sm">Nomor Berkas</label> --}}
            <div wire:loading wire:target="no_berkas">
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
