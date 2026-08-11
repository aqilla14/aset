<?php
namespace Database\Seeders;

use App\Models\Aset;
use Illuminate\Database\Seeder;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asets = [
            // Elektronik (kategori_id = 1)
            [
                'kode_aset'         => 'AST-001',
                'nama_aset'         => 'Laptop HP ProBook 450',
                'kategori_id'       => 1,
                'ruangan_id'        => 1,
                'supplier_id'       => 1,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2025-01-15',
                'harga'             => 12500000,
                'deskripsi'         => 'Laptop untuk staff IT',
            ],
            [
                'kode_aset'         => 'AST-002',
                'nama_aset'         => 'Monitor LG 24 inch',
                'kategori_id'       => 1,
                'ruangan_id'        => 2,
                'supplier_id'       => 1,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2025-01-20',
                'harga'             => 2500000,
                'deskripsi'         => 'Monitor untuk desain grafis',
            ],
            [
                'kode_aset'         => 'AST-003',
                'nama_aset'         => 'Printer Epson L3110',
                'kategori_id'       => 1,
                'ruangan_id'        => 1,
                'supplier_id'       => 1,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2025-02-01',
                'harga'             => 3500000,
                'deskripsi'         => 'Printer untuk admin',
            ],
            [
                'kode_aset'         => 'AST-004',
                'nama_aset'         => 'AC Split 1.5 PK',
                'kategori_id'       => 1,
                'ruangan_id'        => 3,
                'supplier_id'       => 1,
                'status'            => 'dipinjam',
                'tanggal_perolehan' => '2024-09-15',
                'harga'             => 4500000,
                'deskripsi'         => 'AC ruang meeting',
            ],
            [
                'kode_aset'         => 'AST-005',
                'nama_aset'         => 'Proyektor Epson EB-X41',
                'kategori_id'       => 1,
                'ruangan_id'        => 4,
                'supplier_id'       => 1,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2025-03-10',
                'harga'             => 7500000,
                'deskripsi'         => 'Proyektor untuk presentasi',
            ],
            [
                'kode_aset'         => 'AST-006',
                'nama_aset'         => 'Telephone Panasonic KX-TS',
                'kategori_id'       => 1,
                'ruangan_id'        => 2,
                'supplier_id'       => 1,
                'status'            => 'dipinjam',
                'tanggal_perolehan' => '2024-06-20',
                'harga'             => 1500000,
                'deskripsi'         => 'Telepon kantor',
            ],
            [
                'kode_aset'         => 'AST-007',
                'nama_aset'         => 'Dispenser Miyako',
                'kategori_id'       => 1,
                'ruangan_id'        => 5,
                'supplier_id'       => 1,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2025-01-05',
                'harga'             => 2500000,
                'deskripsi'         => 'Dispenser air minum',
            ],

            // Furniture (kategori_id = 2)
            [
                'kode_aset'         => 'AST-008',
                'nama_aset'         => 'Meja Kerja Eksekutif',
                'kategori_id'       => 2,
                'ruangan_id'        => 4,
                'supplier_id'       => 2,
                'status'            => 'dipinjam',
                'tanggal_perolehan' => '2024-12-10',
                'harga'             => 3500000,
                'deskripsi'         => 'Meja untuk ruang direktur',
            ],
            [
                'kode_aset'         => 'AST-009',
                'nama_aset'         => 'Kursi Kantor Ergonomic',
                'kategori_id'       => 2,
                'ruangan_id'        => 6,
                'supplier_id'       => 2,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2024-11-05',
                'harga'             => 1500000,
                'deskripsi'         => 'Kursi ergonomis untuk karyawan',
            ],
            [
                'kode_aset'         => 'AST-010',
                'nama_aset'         => 'Lemari Arsip Besi',
                'kategori_id'       => 2,
                'ruangan_id'        => 5,
                'supplier_id'       => 2,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2024-10-20',
                'harga'             => 2800000,
                'deskripsi'         => 'Lemari untuk arsip dokumen',
            ],
            [
                'kode_aset'         => 'AST-011',
                'nama_aset'         => 'Meja Rapat Besar',
                'kategori_id'       => 2,
                'ruangan_id'        => 3,
                'supplier_id'       => 2,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2024-08-15',
                'harga'             => 5000000,
                'deskripsi'         => 'Meja untuk ruang rapat',
            ],
            [
                'kode_aset'         => 'AST-012',
                'nama_aset'         => 'Rak Buku 5 Susun',
                'kategori_id'       => 2,
                'ruangan_id'        => 4,
                'supplier_id'       => 2,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2025-02-20',
                'harga'             => 2200000,
                'deskripsi'         => 'Rak buku untuk perpustakaan mini',
            ],

            // Kendaraan (kategori_id = 3)
            [
                'kode_aset'         => 'AST-013',
                'nama_aset'         => 'Mobil Avanza 1.3 G',
                'kategori_id'       => 3,
                'ruangan_id'        => 7,
                'supplier_id'       => 7,
                'status'            => 'rusak',
                'tanggal_perolehan' => '2023-08-20',
                'harga'             => 250000000,
                'deskripsi'         => 'Mobil operasional kantor',
            ],
            [
                'kode_aset'         => 'AST-014',
                'nama_aset'         => 'Motor Honda Beat',
                'kategori_id'       => 3,
                'ruangan_id'        => 7,
                'supplier_id'       => 7,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2024-07-10',
                'harga'             => 18000000,
                'deskripsi'         => 'Motor untuk kurir',
            ],
            [
                'kode_aset'         => 'AST-015',
                'nama_aset'         => 'Motor Yamaha NMAX',
                'kategori_id'       => 3,
                'ruangan_id'        => 7,
                'supplier_id'       => 7,
                'status'            => 'dipinjam',
                'tanggal_perolehan' => '2024-12-01',
                'harga'             => 32000000,
                'deskripsi'         => 'Motor operasional lapangan',
            ],

            // Alat Tulis (kategori_id = 4)
            [
                'kode_aset'         => 'AST-016',
                'nama_aset'         => 'Mesin Fotocopy Canon IR',
                'kategori_id'       => 4,
                'ruangan_id'        => 2,
                'supplier_id'       => 4,
                'status'            => 'rusak',
                'tanggal_perolehan' => '2023-05-01',
                'harga'             => 15000000,
                'deskripsi'         => 'Mesin fotocopy lama',
            ],
            [
                'kode_aset'         => 'AST-017',
                'nama_aset'         => 'Mesin Penghancur Kertas',
                'kategori_id'       => 4,
                'ruangan_id'        => 5,
                'supplier_id'       => 4,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2024-11-15',
                'harga'             => 4500000,
                'deskripsi'         => 'Mesin penghancur dokumen',
            ],

            // Peralatan Laboratorium (kategori_id = 6)
            [
                'kode_aset'         => 'AST-018',
                'nama_aset'         => 'Mikroskop Binokuler',
                'kategori_id'       => 6,
                'ruangan_id'        => 6,
                'supplier_id'       => 5,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2025-02-15',
                'harga'             => 12500000,
                'deskripsi'         => 'Mikroskop untuk laboratorium biologi',
            ],

            // Perangkat Jaringan (kategori_id = 7)
            [
                'kode_aset'         => 'AST-019',
                'nama_aset'         => 'Switch Cisco 24 Port',
                'kategori_id'       => 7,
                'ruangan_id'        => 9,
                'supplier_id'       => 6,
                'status'            => 'tersedia',
                'tanggal_perolehan' => '2025-03-01',
                'harga'             => 8500000,
                'deskripsi'         => 'Switch jaringan utama',
            ],
            [
                'kode_aset'         => 'AST-020',
                'nama_aset'         => 'Router Mikrotik RB750',
                'kategori_id'       => 7,
                'ruangan_id'        => 9,
                'supplier_id'       => 6,
                'status'            => 'pemeliharaan',
                'tanggal_perolehan' => '2024-10-10',
                'harga'             => 3200000,
                'deskripsi'         => 'Router untuk koneksi internet',
            ],
        ];

        foreach ($asets as $aset) {
            Aset::create($aset);
        }
    }
}
