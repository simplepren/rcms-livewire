<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use App\Models\Berkas;

new
#[Layout('layouts.layout-qrcode')]

class extends Component {
    public $kode_boks;
    public $data_berkas = [];

    public function updatedKodeBoks()
    {
        $this->data_berkas = Berkas::where('kode_boks', $this->kode_boks)->orderBy('no_berkas')->get();
        $this->kode_boks = '';
    }

};
?>

<div class="lg:px-6 block w-full">
    <style>
        #scanner-animate{
            animation: scanning 1.5s linear alternate infinite;
        }

        @keyframes scanning
        {
            0%{transform: translatey(0px);}
            100%{transform: translatey(190px);}
        }
    </style>
    <div wire:loading class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="mb-3 flex justify-center">
        <h5 class="text-2xl font-semibold text-slate-600">PENCARIAN BERKAS</h5>
    </div>
    <div class="justify-center mb-3 hidden" id="frame">
        <div class="flex justify-center">
            <div class="w-96 relative">
                <video class="w-full" id="preview" wire:ignore></video>
                <div class="absolute top-0 right-0 bottom-0 w-full  z-10">
                    <div class="absolute top-12 left-12 right-12 bottom-12 h-2 bg-gradient-to-b from-sky-500 to-transparent z-30 " id="scanner-animate"></div>
                    <div class="absolute top-0 left-0 right-0 h-12 bg-black opacity-60 z-50"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-12 bg-black opacity-60 z-50"></div>
                    <div class="absolute top-12 bottom-12 left-0 w-12 bg-black opacity-60 z-50"></div>
                    <div class="absolute top-12 bottom-12 right-0 w-12 bg-black opacity-60 z-50"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mb-3">
        <div class="lg:w-1/2 w-full flex justify-center">
            <button id="btn_toggle" type="button" class="text-white bg-sky-700 hover:bg-sky-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-md px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Scan
            </button>
            <button id="mirror" type="button" class="hidden text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">
                Mirror Cam
            </button>
        </div>
    </div>
    <div class="flex justify-center mb-3">
        <div>
            <select class="hidden" name="" id="kamera"></select>
            <input type="text" wire:model.live="kode_boks" class="hidden" placeholder="Scan disini.." autofocus>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="lg:w-1/2 w-full">
            @if ($data_berkas)
                @forelse ($data_berkas as $item)
                        <div class="border border-gray-400 rounded-lg mb-5">
                            <div class="p-4 flex justify-center bg-slate-500 rounded-t-lg">
                                <h5 class="text-3xl text-white font-semibold">{{ $item->kode_boks }}</h5>
                            </div>
                            <div class="px-6 py-4">
                                <div class="flex w-full mb-3">
                                    <div class="w-1/3 flex items-center">No. Berkas</div>
                                    <span class="w-2/3">: {{ $item->no_berkas }}</span>
                                </div>
                                <div class="flex w-full mb-3">
                                    <div class="w-1/3 flex items-center">Uraian. Berkas</div>
                                    <span class="w-2/3">: {{ $item->uraian_berkas }}</span>
                                </div>
                                <div class="flex w-full mb-3">
                                    <div class="w-1/3 flex items-center">Unit Pengolah</div>
                                    <span class="w-2/3">: {{ $item->unit->nama_unit }}</span>
                                </div>
                                <div class="flex w-full mb-3">
                                    <div class="w-1/3 flex items-center">Tahun</div>
                                    <span class="w-2/3">: {{ $item->tahun }}</span>
                                </div>
                                <div class="flex w-full mb-3">
                                    <div class="w-1/3 flex items-center">Klasifikasi</div>
                                    <span class="w-2/3">: {{ $item->kode_klas.' - '.$item->fungsi }}</span>
                                </div>
                                <div class="flex w-full mb-3">
                                    <div class="w-1/3 flex items-center">Jenis Arsip</div>
                                    <span class="w-2/3">: {{ $item->jenis_arsip }}</span>
                                </div>
                                <div class="flex w-full mb-3">
                                    <div class="w-1/3 flex items-center">No. Folder</div>
                                    <span class="w-2/3">: {{ $item->folder }}</span>
                                </div>
                            </div>
                        </div>
                @empty
                    <div class="text-center">Data tidak ditemukan..</div>
                @endforelse
            @endif
        </div>
    </div>

    @script
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        let btn_toggle = document.getElementById('btn_toggle');
        let btn_switch = document.getElementById('switch');
        let frame = document.getElementById('frame');
        let opt_camera = document.getElementById('kamera');
        let mirror = document.getElementById('mirror');
        btn_toggle.addEventListener('click', function() {
            if(frame.classList.contains('hidden')) {
                scanner.addListener('scan', function (content) {
                if(content) {
                    $wire.set('kode_boks', content);
                    scanner.stop();
                    scanEnded();
                }
                });

                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                        for(let i = cameras.length - 1; i >= 0; i--) {
                            opt_camera.classList.remove('hidden');
                            let option = document.createElement('option');
                            option.value = cameras[i].id;
                            option.innerHTML = cameras[i].name;
                            opt_camera.appendChild(option);
                        }
                        scanStarted();
                        scanner.start(cameras[cameras.length - 1]);
                        opt_camera.addEventListener('change', function() {
                            scanner.start(cameras[this.value]);
                        });
                        mirror.addEventListener('click', function() {
                            scanner.mirror = !scanner.mirror;
                        })
                    }else{
                        alert('Kamera tidak ditemukan..');
                    }
                });
            }else{
                scanner.stop();
                scanEnded();
            }
        });

        function scanEnded() {
            mirror.classList.add('hidden');
            frame.classList.add('hidden');
            opt_camera.classList.add('hidden');
            opt_camera.classList.remove('input');
            opt_camera.classList.remove('input-bordered');
            btn_toggle.classList.remove('bg-red-500');
            btn_toggle.classList.remove('hover:bg-red-600');
            btn_toggle.classList.add('bg-sky-700');
            btn_toggle.classList.add('hover:bg-sky-800');
            btn_toggle.textContent = 'Scan';
        }

        function scanStarted() {
            mirror.classList.remove('hidden');
            frame.classList.remove('hidden');
            opt_camera.classList.add('input');
            opt_camera.classList.add('input-bordered');
            btn_toggle.classList.remove('bg-sky-700');
            btn_toggle.classList.remove('hover:bg-sky-800');
            btn_toggle.classList.add('bg-red-500');
            btn_toggle.classList.add('hover:bg-red-600');
            btn_toggle.textContent = 'Stop Scan';
        }
    </script>
    @endscript
</div>
