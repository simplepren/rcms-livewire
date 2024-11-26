<?php

namespace App\Livewire\Isiberkas\Input;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\IsiberkasImport;
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
        return view('livewire.isiberkas.input.upload');
    }

    public function formUpload()
    {
        $validated = $this->validate();
        $array = Excel::import(new IsiberkasImport, $validated['file_upload']);
        $this->dispatch('success', ['message' => 'Data/daftar isi berkas berhasil di-upload.']);
    }

    public function downloadFile()
    {
        $file = Storage::disk('public')->download('Form_upload_daftar_isi_berkas.xlsx');
        return $file;
    }
}
