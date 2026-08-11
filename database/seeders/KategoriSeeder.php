<?php
namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Elektronik', 'deskripsi' => 'Perangkat elektronik dan komputer'],
            ['nama_kategori' => 'Furniture', 'deskripsi' => 'Perabotan kantor'],
            ['nama_kategori' => 'Kendaraan', 'deskripsi' => 'Kendaraan operasional'],
            ['nama_kategori' => 'Alat Tulis', 'deskripsi' => 'Perlengkapan tulis kantor'],
            ['nama_kategori' => 'Mesin', 'deskripsi' => 'Mesin dan peralatan berat'],
            ['nama_kategori' => 'Peralatan Laboratorium', 'deskripsi' => 'Alat-alat laboratorium'],
            ['nama_kategori' => 'Perangkat Jaringan', 'deskripsi' => 'Perangkat jaringan komputer'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
