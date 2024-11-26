<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\User;
use App\Models\Berkas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $guarded = ['id'];

    /**
     * Get the unit that owns the Peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detailUnit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit', 'kode_unit');
    }

    public function detailBerkas(): BelongsTo
    {
        return $this->belongsTo(Berkas::class, 'id_berkas', 'id_berkas');
    }

    public function detailPetugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas', 'nip');
    }
}
