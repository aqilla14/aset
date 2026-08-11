<?php
namespace Database\Seeders;

use App\Models\Pengembalian;
use Illuminate\Database\Seeder;

class PengembalianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengembalians = [
            [
                'peminjaman_id'   => 3,
                'tanggal_kembali' => '2026-08-01',
                'kondisi'         => 'baik',
                'catatan'         => 'Kondisi barang baik',
            ],
            [
                'peminjaman_id'   => 5,
                'tanggal_kembali' => '2026-07-26',
                'kondisi'         => 'baik',
                'catatan'         => 'Dikembalikan lebih awal',
            ],
            [
                'peminjaman_id'   => 9,
                'tanggal_kembali' => '2026-07-26',
                'kondisi'         => 'rusak_ringan',
                'catatan'         => 'Ada goresan kecil di kursi',
            ],
        ];

        foreach ($pengembalians as $pengembalian) {
            Pengembalian::create($pengembalian);
        }
    }
}
