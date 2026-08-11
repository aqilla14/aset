<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $table = 'pemeliharaans';  // ← ini
    protected $fillable = [
        'aset_id',
        'tanggal_pemeliharaan',
        'jenis_pemeliharaan',
        'biaya',
        'keterangan'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }
}
