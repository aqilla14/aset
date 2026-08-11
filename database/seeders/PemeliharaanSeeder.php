<?php
namespace Database\Seeders;

use App\Models\Pemeliharaan;
use Illuminate\Database\Seeder;

class PemeliharaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pemeliharaans = [
            [
                'aset_id'              => 1,
                'tanggal_pemeliharaan' => '2026-07-15',
                'jenis_pemeliharaan'   => 'Service Berkala',
                'biaya'                => 500000,
                'keterangan'           => 'Service laptop rutin',
            ],
            [
                'aset_id'              => 2,
                'tanggal_pemeliharaan' => '2026-07-30',
                'jenis_pemeliharaan'   => 'Kalibrasi',
                'biaya'                => 750000,
                'keterangan'           => 'Kalibrasi monitor warna',
            ],
            [
                'aset_id'              => 3,
                'tanggal_pemeliharaan' => '2026-07-25',
                'jenis_pemeliharaan'   => 'Ganti Tinta',
                'biaya'                => 350000,
                'keterangan'           => 'Ganti tinta printer',
            ],
            [
                'aset_id'              => 5,
                'tanggal_pemeliharaan' => '2026-08-01',
                'jenis_pemeliharaan'   => 'Service Berkala',
                'biaya'                => 450000,
                'keterangan'           => 'Service proyektor rutin',
            ],
            [
                'aset_id'              => 7,
                'tanggal_pemeliharaan' => '2026-07-10',
                'jenis_pemeliharaan'   => 'Service Berkala',
                'biaya'                => 200000,
                'keterangan'           => 'Service dispenser',
            ],
            [
                'aset_id'              => 9,
                'tanggal_pemeliharaan' => '2026-06-20',
                'jenis_pemeliharaan'   => 'Perbaikan Kerusakan',
                'biaya'                => 1200000,
                'keterangan'           => 'Perbaikan kursi yang rusak',
            ],
            [
                'aset_id'              => 11,
                'tanggal_pemeliharaan' => '2026-07-18',
                'jenis_pemeliharaan'   => 'Service Berkala',
                'biaya'                => 800000,
                'keterangan'           => 'Perawatan meja rapat',
            ],
            [
                'aset_id'              => 13,
                'tanggal_pemeliharaan' => '2026-07-20',
                'jenis_pemeliharaan'   => 'Service Besar',
                'biaya'                => 2500000,
                'keterangan'           => 'Service mesin mobil',
            ],
            [
                'aset_id'              => 14,
                'tanggal_pemeliharaan' => '2026-07-22',
                'jenis_pemeliharaan'   => 'Ganti Suku Cadang',
                'biaya'                => 1500000,
                'keterangan'           => 'Ganti ban motor',
            ],
            [
                'aset_id'              => 16,
                'tanggal_pemeliharaan' => '2026-06-15',
                'jenis_pemeliharaan'   => 'Service Besar',
                'biaya'                => 3000000,
                'keterangan'           => 'Service mesin fotocopy',
            ],
            [
                'aset_id'              => 17,
                'tanggal_pemeliharaan' => '2026-07-28',
                'jenis_pemeliharaan'   => 'Service Berkala',
                'biaya'                => 250000,
                'keterangan'           => 'Service mesin penghancur kertas',
            ],
            [
                'aset_id'              => 18,
                'tanggal_pemeliharaan' => '2026-08-02',
                'jenis_pemeliharaan'   => 'Kalibrasi',
                'biaya'                => 1000000,
                'keterangan'           => 'Kalibrasi mikroskop',
            ],
            [
                'aset_id'              => 19,
                'tanggal_pemeliharaan' => '2026-07-28',
                'jenis_pemeliharaan'   => 'Update Firmware',
                'biaya'                => 150000,
                'keterangan'           => 'Update firmware switch',
            ],
            [
                'aset_id'              => 20,
                'tanggal_pemeliharaan' => '2026-07-29',
                'jenis_pemeliharaan'   => 'Update Firmware',
                'biaya'                => 150000,
                'keterangan'           => 'Update firmware router',
            ],
        ];

        foreach ($pemeliharaans as $pemeliharaan) {
            Pemeliharaan::create($pemeliharaan);
        }
    }
}
