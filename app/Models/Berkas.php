<?php

namespace App\Models;

use App\Models\Isiberkas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berkas extends Model
{
    use HasFactory;

    protected $table = 'berkas';
    protected $guarded = ['id'];

    public function itemBerkas(): HasMany
    {
        return $this->hasMany(Isiberkas::class, 'id_berkas', 'id_berkas');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_pengolah', 'kode_unit');
    }

    public function retensi(): Attribute
    {
        return new Attribute(
            get: fn () => (($this->aktif + $this->inaktif + $this->tahun) < date('Y')) ? 'Usul Musnah' : 'Inaktif',
        );
    }
}
