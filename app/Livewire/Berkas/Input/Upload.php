<?php

namespace App\Livewire\Berkas\Input;

use Livewire\Component;
use App\Imports\BerkasImport;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class Upload extends Component
{
    use WithFileUploads;

    #[Validate('required', message: 'File tidak boleh kosong.')]
    public $file_upload;

    public function render()
    {
        return view('livewire.berkas.input.upload');
    }

    public function formUpload()
    {
        $validated = $this->validate();
        $array = Excel::import(new BerkasImport, $validated['file_upload']);
        $this->dispatch('success', ['message' => 'Data/daftar berkas berhasil di-upload.']);
    }

    public function downloadFile()
    {
        $file = Storage::disk('public')->download('Form_upload_daftar_berkas.xlsx');
        return $file;
    }
}
