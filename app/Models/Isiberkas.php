<?php

namespace App\Models;

use App\Models\Berkas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Isiberkas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'isiberkas';

    public function berkas(): BelongsTo
    {
        return $this->belongsTo(Berkas::class, 'id_berkas');
    }
}
