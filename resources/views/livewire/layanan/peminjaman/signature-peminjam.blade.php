<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use App\Models\Peminjaman;

new
#[Layout('layouts.layout-qrcode')]

class extends Component {
    public $signed;
    public $id_peminjaman;

    public function mount($id)
    {
        $data = Peminjaman::where('id_peminjaman', $id)->first();
        if($data){
            $this->id_peminjaman = $data->id_peminjaman;
        }else{
            return abort(404);
        }
    }

    public function formEsign()
    {
        $image_parts = explode(";base64,", $this->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = uniqid() . '.'.$image_type;
        Storage::disk('real_public')->put('assets/images/signature/' . $file, $image_base64);

        //masukkan ke database
        Peminjaman::where('id_peminjaman', $this->id_peminjaman)->update(['esign_peminjam' => $file]);
        $this->dispatch('success',['message' => 'Peminjaman arsip berhasil ditandatangani.']);
        $this->dispatch('resetForm');
    }
};
?>

<div class="">
    <div wire:loading wire:target="formEsign" class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="px-4">
        <form wire:submit.prevent="formEsign">
            <div class="flex justify-center">
                <div class="mb-4 text-center text-xl font-semibold">Esign Peminjam Arsip</div>
            </div>
            <div class="mt-4" style="width: 600px; margin: 0 auto">
                <div class="px-4 mb-2 flex justify-center" style="height: 300px">
                    <div class="canvas w-full shadow-lg shadow-gray-200" id="signature-box" wire:ignore></div>
                </div>
                <div>
                    <textarea wire:model="signed" class="hidden"></textarea>
                </div>
                <div class="px-4 flex justify-start gap-2">
                    <x-my-default-button class="text-sm" type="submit">Save</x-my-default-button>
                    <x-my-warning-button class="text-sm" id="clear">Clear</x-my-warning-button>
                </div>
            </div>
        </form>
    </div>

    @script
    <script type="text/javascript">
        const sig = $('#signature-box').signature({
            // syncField: '#test',
            syncFormat: 'PNG',
            change: function() {
                $wire.set('signed', sig.signature('toDataURL'));
            }
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            reset();
        });

        function reset() {
            sig.signature('clear');
            $wire.set('signed', '');
        }

        window.addEventListener('resetForm', () => {
            reset();
        })
    </script>
    @endscript
</div>
