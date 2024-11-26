<?php

namespace App\Livewire\Layanan\Peminjaman;

use App\Models\Unit;
use App\Models\Berkas;
use Livewire\Component;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $search_berkas = '';
    public $data_berkas = [];
    public $id_peminjaman;

    #[Validate('required', message : "Nama peminjam harus diisi")]
    public $nama;

    #[Validate('nullable|numeric', message : "NIP harus berupa angka")]
    public $nip;

    #[Validate('required', message : "ID berkas harus diisi")]
    public $id_berkas;

    #[Validate('required', message : "Nomor berkas harus diisi")]
    public $no_berkas;

    #[Validate('required', message : "Uraian berkas harus diisi")]
    public $uraian_berkas;

    #[Validate('required', message : "Unit harus diisi")]
    public $unit;

    #[Validate('required', message : "Tanggal pinjam harus diisi")]
    public $tgl_pinjam;

    #[Validate('required', message : "Keperluan harus diisi")]
    public $keperluan;

    #[Validate('nullable', message : "Tanggal kembali harus diisi")]
    public $tgl_kembali;

    public function render()
    {
        $data = Peminjaman::where('kode_uk', auth()->user()->kode_uk)
                            ->where(function($query) {
                                $query->where('uraian_berkas', 'like', '%'.$this->search.'%')
                                ->orWhere('nama', 'like', '%'.$this->search.'%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate($this->perPage);
        $data_unit = Unit::where('kode_unit', 'like', auth()->user()->kode_uk.'%')->get();
        return view('livewire.layanan.peminjaman.index', [
            'data_peminjaman' => $data,
            'data_unit' => $data_unit
        ]);
    }

    public function updatedNoBerkas()
    {
        $this->data_berkas = Berkas::where('kode_uk', auth()->user()->kode_uk)
                                ->where(function($query) {
                                    $query->where('no_berkas', 'like', '%'.$this->no_berkas.'%')
                                        ->orWhere('uraian_berkas', 'like', '%'.$this->no_berkas.'%');
                                })
                                ->where('status_musnah' , '=', 0)
                                ->get()
                                ->take(10);

        $this->search_berkas = $this->data_berkas;
    }

    public function selectedBerkas($id)
    {
        $data = Berkas::find($id);
        $this->id_berkas = $data->id_berkas;
        $this->no_berkas = $data->no_berkas;
        $this->uraian_berkas = $data->uraian_berkas;
        $this->search_berkas = [];
    }

    public function tambah()
    {
        $this->dispatch('open-modal', 'modal-tambah');
    }

    public function closeModalPeminjaman()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-tambah');
    }


    public function formPeminjaman()
    {
        $validated = $this->validate();
        unset($validated['no_berkas']);

        //bikin ID Peminjaman
        $validated['kode_uk'] = auth()->user()->kode_uk;
        $validated['id_peminjaman'] = Str::upper(Str::random(8));
        $validated['enc_id'] = Str::uuid();
        $validated['petugas'] = auth()->user()->nip;

        //masukkan ke database
        Peminjaman::create($validated);
        $this->reset();
        $this->dispatch('success', ['message' => 'Data peminjaman berhasil ditambahkan.']);
        $this->dispatch('close-modal', 'modal-tambah');
    }

    public function kembalikan($id)
    {
        $data = Peminjaman::find($id);
        $this->id_peminjaman = $data->id;
        $this->uraian_berkas = $data->uraian_berkas;
        $this->dispatch('open-modal', 'modal-kembalikan');
    }

    public function formKembalikan()
    {
        $validated = $this->validate(['tgl_kembali' => 'required']);
        $validated['petugas'] = auth()->user()->nip;
        $validated['esign_petugas'] = auth()->user()->esign;
        $data = Peminjaman::find($this->id_peminjaman);

        //cek apakah peminjam sudah ttd
        if ($data->esign_peminjam == null) {
            $this->dispatch('error', ['message' => 'Peminjam belum tanda tangan.']);
            $this->reset();
            $this->dispatch('close-modal', 'modal-kembalikan');
            return;
        }

        //masukkan ke database
        $data->update($validated);
        $this->dispatch('success', ['message' => 'Berkas berhasil dikembalikan.']);
        $this->reset();
        $this->dispatch('close-modal', 'modal-kembalikan');
    }

    public function hapus($id)
    {
        $data = Peminjaman::findOrFail($id);
        $this->id_peminjaman = $data->id;
        $this->dispatch('open-modal', 'modal-hapus');
    }

    public function formHapus()
    {
        $data = Peminjaman::find($this->id_peminjaman);
        $data->delete();
        $this->dispatch('success', ['message' => 'Data peminjaman berhasil dihapus.']);
        $this->reset();
        $this->dispatch('close-modal', 'modal-hapus');
    }

    public function sign($id)
    {
        $data = Peminjaman::find($id);
        $this->dispatch('redirect', ['url' => '/esign-peminjam/'.$data->id_peminjaman]);
    }

    public function closeModalKembalikan()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-kembalikan');
    }

    public function closeModalHapus()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-hapus');
    }

    public function cetak($id)
    {
        $id_peminjaman = Peminjaman::find($id)->id_peminjaman;
        // return redirect('/layanan/peminjaman-arsip/cetak-bukti-peminjaman/'.$id_peminjaman);
        $this->dispatch('redirectURLCetak', ['url' => '/layanan/peminjaman-arsip/cetak-bukti-peminjaman/'.$id_peminjaman]);
    }
}
