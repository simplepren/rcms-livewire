<?php

namespace App\Livewire\Sarpras\Ruangan;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use Livewire\Attributes\On;
use App\Models\Recordscenter;
use Livewire\Attributes\Validate;

class Index extends Component
{
    public $perPage = 10;
    public $search = '';

    public $id_ruangan;
    public $old_kode_ruang;
    public $ubah_data = false;
    public $hapus_rak = false;

    #[Validate('required', message: 'Kode RC harus diisi.')]
    public $kode_rc;

    #[Validate('required', message: 'Kode ruangan harus diisi.')]
    public $kode_ruang;

    #[Validate('nullable')]
    public $nama_ruang;

    #[On('refresh-rc')]
    public function render()
    {
        $ruangan = Ruangarsip::where(function($query){
                                    return $query->where('kode_ruang', 'like', '%'.$this->search.'%')
                                    ->orWhere('nama_ruang', 'like', '%'.$this->search.'%');
                                })
                                ->where('kode_uk', auth()->user()->kode_uk)
                                ->orderBy('kode_rc', 'desc')
                                ->orderBy('created_at', 'desc')
                                ->paginate($this->perPage);

        $rc = Recordscenter::where('kode_uk', auth()->user()->kode_uk)->get();

        return view('livewire.sarpras.ruangan.index',[
            'data_ruangan' => $ruangan,
            'data_rc' => $rc
        ]);
    }

    public function tambah()
    {
        $this->dispatch('open-modal', 'modal-tambah-ruangan');
    }

    public function formTambahRuangan()
    {
        $validated = $this->validate();
        $kode_uk = auth()->user()->kode_uk;
        $cekRuang = Ruangarsip::where('kode_rc', $this->kode_rc)->where('kode_ruang', $this->kode_ruang)->where('kode_uk', $kode_uk)->first();
        if($cekRuang){
            $this->dispatch('error', ['message' => 'Kode ruangan sudah ada, silakan ganti yang lain.']);
            $this->kode_ruang = '';
            return;
        }
        $validated['kode_uk'] = $kode_uk;
        Ruangarsip::create($validated);
        $this->dispatch('success',['message' => 'Data ruangan berhasil ditambahkan.']);
        $this->closeModalRuangan();
    }

    public function editRuangan($id)
    {
        $data_ruang = Ruangarsip::find($id);
        $this->id_ruangan = $data_ruang->id;
        $this->old_kode_ruang = $data_ruang->kode_ruang;
        $this->kode_rc = $data_ruang->kode_rc;
        $this->kode_ruang = $data_ruang->kode_ruang;
        $this->nama_ruang = $data_ruang->nama_ruang;

        $this->dispatch('open-modal', 'modal-edit-ruangan');
    }

    public function formEditRuangan()
    {
        $validated = $this->validate();

        //cek apakah kode ruangan duplikasi
        $cek = Ruangarsip::where('kode_uk', auth()->user()->kode_uk)->where('kode_rc', $this->kode_rc)->where('kode_ruang', $this->kode_ruang)->where('id', '!=', $this->id_ruangan)->where('kode_uk', auth()->user()->kode_uk)->first();
        if($cek){
            $this->dispatch('error', ['message' => 'Kode ruangan sudah ada, silakan ganti yang lain.']);
            $this->kode_ruang = '';
            return;
        }

        //ubah data ruangan pada data berkas
        if($this->ubah_data){
            Berkas::where('kode_uk', auth()->user()->kode_uk)->where('lokasi_rc', $this->kode_rc)->where('ruang', $this->old_kode_ruang)->update(['ruang' => $this->kode_ruang]);
        }

        //ubah data ruangan pada data rak
        Rakarsip::where('kode_rc', $this->kode_rc)->where('kode_ruang', $this->old_kode_ruang)->update(['kode_ruang' => $this->kode_ruang]);

        //ubah data ruangan
        Ruangarsip::where('id', $this->id_ruangan)->update($validated);
        $this->dispatch('success', ['message' => 'Data ruangan berhasil diubah.']);
        $this->dispatch('refresh-ruangan');
        $this->closeModalEditRuangan();
    }

    public function hapusRuangan($id)
    {
        $data_rak = Ruangarsip::find($id);
        $this->id_ruangan = $data_rak->id;
        $this->dispatch('open-modal', 'modal-hapus-ruangan');
    }

    public function formHapusRuangan()
    {
        $data_ruangan = Ruangarsip::find($this->id_ruangan);

        //cek berkas pada rak
        $cek_ruangan = Berkas::where('lokasi_rc', $data_ruangan->kode_rc)->where('ruang', $data_ruangan->kode_ruang)->count();
        if($cek_ruangan > 0){
            $this->dispatch('error', ['message' => 'Ruangan gagal dihapus karena terdapat berkas pada ruangan.']);
            $this->closeModalHapusRuangan();
            return;
        }

        //hapus rak?
        if($this->hapus_rak){
            Rakarsip::where('kode_ruang', $data_ruangan->kode_ruang)->where('kode_rc', $data_ruangan->kode_rc)->delete();
        }

        //apabila tidak ada berkas, hapus ruangan
        $data_ruangan->delete();

        $this->dispatch('success', ['message' => 'Ruangan berhasil dihapus.']);
        $this->dispatch('refresh-ruangan');
        $this->closeModalHapusRuangan();
    }

    public function closeModalRuangan()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-tambah-ruangan');
    }

    public function closeModalEditRuangan()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-edit-ruangan');
    }

    public function closeModalHapusRuangan()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-hapus-ruangan');
    }
}
