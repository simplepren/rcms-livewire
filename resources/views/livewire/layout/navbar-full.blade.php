<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/login', navigate: true);
    }

    public function dashboard(){
        $this->redirect('/dashboard');
    }
    public function form_input_berkas(){
        $this->redirect('/input-berkas/form');
    }
    public function upload_berkas(){
        $this->redirect('/input-berkas/upload');
    }
    public function upload_arsip(){
        $this->redirect('/input-arsip/upload');
    }
    public function form_input_arsip(){
        $this->redirect('/input-arsip/form');
    }
    public function daftar_berkas(){
        $this->redirect('/daftar-berkas');
    }
    public function manuver_berkas(){
        $this->redirect('/manajemen-berkas/manuver-berkas');
    }
    public function manuver_isi_berkas(){
        $this->redirect('/manajemen-berkas/manuver-isi-berkas');
    }
    public function pindah_boks(){
        $this->redirect('/manajemen-berkas/pindah-boks');
    }
    public function cetak_qrcode(){
        $this->redirect('/manajemen-berkas/cetak-qrcode');
    }
    public function peminjaman_arsip(){
        $this->redirect('/layanan/peminjaman-arsip');
    }
    public function sarpras(){
        $this->redirect('/referensi/sarpras');
    }
    public function unit_kearsipan(){
        $this->redirect('/referensi/unit-kearsipan');
    }
    public function daftar_unit(){
        $this->redirect('/referensi/unit-pengolah');
    }
    public function kode_klasifikasi(){
        $this->redirect('/referensi/klasifikasi-arsip');
    }
    public function setup_user(){
        $this->redirect('/setup-user');
    }
    public function profile(){
        $this->redirect('/profile');
    }
}; ?>

<nav class="bg-cyan-800 border-gray-200 dark:bg-gray-900">
    <div wire:loading class="fixed left-0 top-0 bg-white opacity-75 text-center w-full h-full" style="z-index: 51">
        <div class="min-h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="max-w-screen flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/dashboard" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/images/logo/KearsipanBPPK.png') }}" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">RCMS</span>
        </a>
        <div class="flex items-center lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full lg:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/images/user/user3.png') }}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <button wire:click="dashboard" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</button>
                        <button wire:click="profile" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</button>
                        <button wire:click="logout" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer">Logout</button>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg lg:hidden hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 lg:p-0 mt-4 border rounded-lg lg:space-x-2 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0">
                <li class="px-1 hover:bg-cyan-700 rounded-md">
                    <button wire:click="dashboard" class="text-sm block py-2 px-3 text-white dark:text-white">Dashboard</button>
                </li>
                <li class="px-1 hover:bg-cyan-700 rounded-md">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="inputBerkas" class="text-white font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" type="button">
                        <span>Input Berkas</span>
                        <svg class="w-2.5 h-2.5 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="inputBerkas" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <button wire:click="form_input_berkas" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Input Berkas</button>
                            </li>
                            <li>
                                <button wire:click="form_input_arsip" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Input Isi Berkas</button>
                            </li>
                            <li>
                                <button wire:click="upload_berkas" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Upload Berkas</button>
                            </li>
                            <li>
                                <button wire:click="upload_arsip" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Upload Isi Berkas</button>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="px-1 hover:bg-cyan-700 rounded-md">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="manajemenBerkas" class="text-white font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" type="button">
                        <span>Manajemen Berkas</span>
                        <svg class="w-2.5 h-2.5 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="manajemenBerkas" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <button wire:click="daftar_berkas" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Daftar Berkas</button>
                            </li>
                            <li>
                                <button wire:click="manuver_berkas" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manuver Berkas</button>
                            </li>
                            <li>
                                <button wire:click="manuver_isi_berkas" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manuver Isi Berkas</button>
                            </li>
                            <li>
                                <button wire:click="pindah_boks" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pindah Boks</button>
                            </li>
                            <li>
                                <button wire:click="cetak_qrcode" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cetak QR Code</button>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="px-1 hover:bg-cyan-700 rounded-md">
                    <button id="dropdownLayanan" data-dropdown-toggle="layanan" class="text-white font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" type="button">
                        <span>Layanan</span>
                        <svg class="w-2.5 h-2.5 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="layanan" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLayanan">
                            <li>
                                <button wire:click="peminjaman_arsip" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Peminjaman Arsip</button>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="px-1 hover:bg-cyan-700 rounded-md">
                    <button id="dropdownReferensi" data-dropdown-toggle="referensi" class="text-white font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" type="button">
                        <span>Referensi</span>
                        <svg class="w-2.5 h-2.5 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="referensi" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownReferensi">
                            <li>
                                <button wire:click="sarpras" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sarpras</button>
                                @if (Auth::user()->role == 'superadmin')
                                    <button wire:click="unit_kearsipan" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Daftar UK</button>
                                @endif
                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                                    <button wire:click="daftar_unit" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Daftar Unit</button>
                                    <button wire:click="kode_klasifikasi" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kode Klasifikasi</button>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                    <li class="px-1 hover:bg-cyan-700 rounded-md">
                        <button wire:click="setup_user" class="text-sm block py-2 px-3 text-white dark:text-white">Setup User</button>
                    </li>
                @endif
            </ul>
        </div>
    </div>
  </nav>
