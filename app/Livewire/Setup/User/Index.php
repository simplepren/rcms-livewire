<?php

namespace App\Livewire\Setup\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Unitkearsipan;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';

    public $id_user;

    #[Validate('required', message: 'Nama lengkap harus diisi')]
    public $name;

    #[Validate('required', message: 'Email harus diisi')]
    #[Validate('unique:users,email', message: 'Email sudah terdaftar')]
    #[Validate('email', message: 'Email tidak valid')]
    public $email;

    #[Validate('required', message: 'NIP lengkap harus diisi')]
    #[Validate('numeric', message: 'NIP harus berupa angka')]
    public $nip;

    #[Validate('required', message: 'Role harus diisi')]
    public $role;

    #[Validate('required', message: 'Unit Kearsipan harus diisi')]
    public $kode_uk;

    #[Validate('required', message: 'Password harus diisi')]
    #[Validate('min:6', message: 'Password minimal 6 karakter')]
    public $password;

    #[Validate('required', message: 'Password harus diisi')]
    #[Validate('min:6', message: 'Password minimal 6 karakter')]
    public $new_password;

    public function render()
    {
        if(auth()->user()->role == 'superadmin') {
            $user = User::where('role', '!=', 'superadmin')
                        ->where(function($query) {
                            return $query->where('name', 'like', '%'.$this->search.'%')
                            ->orWhere('email', 'like', '%'.$this->search.'%');
                            })
                        ->orderBy('role')
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->perPage);
            $data_uk = Unitkearsipan::all();
        }elseif(auth()->user()->role == 'admin') {
            $user = User::where('role', '!=', 'superadmin')
                        ->where(function($query) {
                            return $query->where('name', 'like', '%'.$this->search.'%')
                            ->orWhere('email', 'like', '%'.$this->search.'%');
                            })
                        ->where('kode_uk', auth()->user()->kode_uk)
                        ->orderBy('role')
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->perPage);
            $data_uk = Unitkearsipan::where('kode_uk', auth()->user()->kode_uk)->get();
        }

        return view('livewire.setup.user.index', [
            'data_user' => $user,
            'data_uk' => $data_uk
        ]);
    }

    public function formTambahUser()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'nip' => 'required|numeric',
            'role' => 'required',
            'kode_uk' => 'required',
            'password' => 'required|min:6'
        ]);
        $validated['enc_id'] = Str::uuid();
        $validated['password'] = bcrypt($validated['password']);

        //masukkan ke database
        User::create($validated);
        $this->dispatch('success', ['message' => 'User berhasil ditambahkan']);
        $this->closeModalTambahUser();
    }

    public function editUser($id)
    {
        $data_user = User::find($id);
        $this->id_user = $data_user->id;
        $this->name = $data_user->name;
        $this->email = $data_user->email;
        $this->nip = $data_user->nip;
        $this->role = $data_user->role;
        $this->kode_uk = $data_user->kode_uk;
        $this->dispatch('open-modal', 'modal-edit-user');
    }

    public function formEditUser()
    {
        if($this->password){
            $validated = $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->id_user,
                'nip' => 'required|numeric',
                'role' => 'required',
                'kode_uk' => 'required',
                'password' => 'required|min:6'
            ]);
            $validated['password'] = bcrypt($validated['password']);
        }else{
            $validated = $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->id_user,
                'nip' => 'required|numeric',
                'role' => 'required',
                'kode_uk' => 'required'
            ]);
        }
        $data_user = User::find($this->id_user);
        $data_user->update($validated);
        $this->dispatch('success', ['message' => 'Data User berhasil diubah']);
        $this->closeModalEditUser();
    }

    public function hapusUser($id)
    {
        $data_user = User::find($id);
        $this->id_user = $data_user->id;
        $this->dispatch('open-modal', 'modal-hapus-user');
    }

    public function formHapusUser()
    {
        $data_user = User::find($this->id_user);
        if($data_user->id == auth()->user()->id){
            $this->dispatch('error', ['message' => 'Anda tidak dapat menghapus user Anda sendiri']);
            $this->closeModalHapus();
            return;
        }
        $data_user->delete();
        $this->dispatch('success', ['message' => 'Data User berhasil dihapus']);
        $this->closeModalHapus();
    }

    public function tambahUser()
    {
        $this->dispatch('open-modal', 'modal-tambah-user');
    }

    public function resetUser($id)
    {
        $data_user = User::find($id);
        $this->id_user = $data_user->id;
        $this->dispatch('open-modal', 'modal-reset-user');
    }

    public function formResetUser()
    {
        $data_user = User::find($this->id_user);
        $validated = $this->validate(['new_password' => 'required|min:6']);
        $data_user->update([
            'password' => bcrypt($validated['new_password']),
        ]);
        $this->dispatch('success', ['message' => 'Password berhasil direset']);
        $this->closeModalResetUser();
    }

    public function closeModalResetUser()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-reset-user');
    }

    public function closeModalTambahUser()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-tambah-user');
    }

    public function closeModalEditUser()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-edit-user');
    }

    public function closeModalHapus()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-hapus-user');
    }
}
