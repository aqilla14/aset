<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangans';
    protected $fillable = ['nama_ruangan', 'kode_ruangan', 'lokasi'];

    public function asets()
    {
        return $this->hasMany(Aset::class);
    }
}
