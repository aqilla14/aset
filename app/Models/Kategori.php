<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aset;

class Kategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function asets()
    {
        return $this->hasMany(Aset::class, 'kategori_id');
    }
}