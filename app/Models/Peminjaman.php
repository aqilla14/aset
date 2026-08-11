<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';  // ← ini
    protected $fillable = [
        'aset_id',
        'peminjam',
        'nip_nim',
        'tanggal_pinjam',
        'tanggal_kembali_rencana',
        'tanggal_kembali_aktual',
        'status',
        'keterangan'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
