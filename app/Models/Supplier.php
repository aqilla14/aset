<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = ['nama_supplier', 'kontak', 'email', 'alamat'];

    public function aset()
    {
        return $this->hasMany(Aset::class);
    }
}
