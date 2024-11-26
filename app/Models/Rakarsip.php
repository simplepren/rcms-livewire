<?php

namespace App\Models;

use App\Models\Berkas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rakarsip extends Model
{
    use HasFactory;
    protected $table = 'rakarsip';
    protected $guarded = ['id'];

    /**
     * Get all of the comments for the Rakarsip
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function berkasRak(): HasMany
    {
        return $this->hasMany(Berkas::class, 'rak', 'nama_rak');
    }
}
