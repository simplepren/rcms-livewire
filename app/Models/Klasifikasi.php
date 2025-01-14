<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'klasifikasi';

    public function berkas()
    {
        return $this->hasMany(Berkas::class);
    }
}
