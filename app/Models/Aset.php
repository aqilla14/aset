<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Ruangan;
use App\Models\Supplier;
use App\Models\Peminjaman;
use App\Models\Pemeliharaan;

class Aset extends Model
{
    protected $table = 'asets'; 
    protected $fillable = [
        'kode_aset',
        'nama_aset',
        'kategori_id',
        'ruangan_id',
        'supplier_id',
        'status',
        'tanggal_perolehan',
        'harga',
        'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function pemeliharaan()
    {
        return $this->hasMany(Pemeliharaan::class);
    }
}
