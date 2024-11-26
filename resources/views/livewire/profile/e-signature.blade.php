<?php

use Livewire\Volt\Component;

new class extends Component {

    public function rekamEsign()
    {
        $id = auth()->user()->enc_id;
        $this->redirect('/esign-petugas/'.$id);
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            E-Signature
        </h2>
    </header>
    @if (auth()->user()->esign)
        <div class="mt-2 flex">
            <svg width="20px" height="20px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.624"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z" fill="#00df70"></path> </g></svg>
            <span class="text-sm text-gray-600">Anda sudah melakukan perekaman E-Signature</span>
        </div>
        <div class="mt-3">
            <x-primary-button wire:click="rekamEsign" class="text-sm">Rekam Ulang</x-primary-button>
        </div>
    @else
        <div class="mt-2">
            <span class="text-sm text-amber-600">Anda belum melakukan perekaman E-Signature</span>
        </div>
        <div class="mt-3">
            <x-primary-button wire:click="rekamEsign" class="text-sm">Rekam</x-primary-button>
        </div>
    @endif
</section>
