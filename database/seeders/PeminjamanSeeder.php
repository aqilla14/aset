<?php
namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peminjamans = [
            [
                'aset_id'                 => 4,
                'peminjam'                => 'Budi Santoso',
                'nip_nim'                 => '1987654321',
                'tanggal_pinjam'          => '2026-08-01',
                'tanggal_kembali_rencana' => '2026-08-08',
                'tanggal_kembali_aktual'  => null,
                'status'                  => 'dipinjam',
                'keterangan'              => 'Untuk rapat direksi',
            ],
            [
                'aset_id'                 => 6,
                'peminjam'                => 'Siti Rahayu',
                'nip_nim'                 => '1987654322',
                'tanggal_pinjam'          => '2026-08-02',
                'tanggal_kembali_rencana' => '2026-08-09',
                'tanggal_kembali_aktual'  => null,
                'status'                  => 'dipinjam',
                'keterangan'              => 'Untuk meeting klien',
            ],
            [
                'aset_id'                 => 8,
                'peminjam'                => 'Agus Widodo',
                'nip_nim'                 => '1987654323',
                'tanggal_pinjam'          => '2026-07-25',
                'tanggal_kembali_rencana' => '2026-08-01',
                'tanggal_kembali_aktual'  => '2026-08-01',
                'status'                  => 'kembali',
                'keterangan'              => 'Sudah dikembalikan',
            ],
            [
                'aset_id'                 => 15,
                'peminjam'                => 'Dewi Anggraini',
                'nip_nim'                 => '1987654324',
                'tanggal_pinjam'          => '2026-07-28',
                'tanggal_kembali_rencana' => '2026-08-04',
                'tanggal_kembali_aktual'  => null,
                'status'                  => 'dipinjam',
                'keterangan'              => 'Operasional lapangan',
            ],
            [
                'aset_id'                 => 9,
                'peminjam'                => 'Rudi Hartono',
                'nip_nim'                 => '1987654325',
                'tanggal_pinjam'          => '2026-07-20',
                'tanggal_kembali_rencana' => '2026-07-27',
                'tanggal_kembali_aktual'  => '2026-07-26',
                'status'                  => 'kembali',
                'keterangan'              => 'Sudah dikembalikan lebih awal',
            ],
            [
                'aset_id'                 => 2,
                'peminjam'                => 'Indah Permata',
                'nip_nim'                 => '1987654326',
                'tanggal_pinjam'          => '2026-08-03',
                'tanggal_kembali_rencana' => '2026-08-10',
                'tanggal_kembali_aktual'  => null,
                'status'                  => 'dipinjam',
                'keterangan'              => 'Untuk presentasi',
            ],
            [
                'aset_id'                 => 7,
                'peminjam'                => 'Hendra Gunawan',
                'nip_nim'                 => '1987654327',
                'tanggal_pinjam'          => '2026-08-01',
                'tanggal_kembali_rencana' => '2026-08-08',
                'tanggal_kembali_aktual'  => null,
                'status'                  => 'dipinjam',
                'keterangan'              => 'Untuk ruang tamu',
            ],
            [
                'aset_id'                 => 12,
                'peminjam'                => 'Lina Marlina',
                'nip_nim'                 => '1987654328',
                'tanggal_pinjam'          => '2026-07-30',
                'tanggal_kembali_rencana' => '2026-08-06',
                'tanggal_kembali_aktual'  => null,
                'status'                  => 'dipinjam',
                'keterangan'              => 'Untuk pameran',
            ],
            [
                'aset_id'                 => 14,
                'peminjam'                => 'Faisal Rahman',
                'nip_nim'                 => '1987654329',
                'tanggal_pinjam'          => '2026-07-29',
                'tanggal_kembali_rencana' => '2026-08-05',
                'tanggal_kembali_aktual'  => null,
                'status'                  => 'dipinjam',
                'keterangan'              => 'Untuk keperluan lapangan',
            ],
        ];

        foreach ($peminjamans as $peminjaman) {
            Peminjaman::create($peminjaman);
        }
    }
}
