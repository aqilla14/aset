<?php
namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'nama_supplier' => 'PT Teknologi Maju',
                'kontak'        => '081234567890',
                'email'         => 'info@teknologimaju.com',
                'alamat'        => 'Jl. Merdeka No. 1, Jakarta',
            ],
            [
                'nama_supplier' => 'CV Furniture Jaya',
                'kontak'        => '081298765432',
                'email'         => 'sales@furniturejaya.com',
                'alamat'        => 'Jl. Sudirman No. 45, Bandung',
            ],
            [
                'nama_supplier' => 'PT Indo Mesin',
                'kontak'        => '081356789012',
                'email'         => 'info@indomesin.com',
                'alamat'        => 'Jl. Industri Raya No. 78, Surabaya',
            ],
            [
                'nama_supplier' => 'CV Alat Tulis Abadi',
                'kontak'        => '081377889900',
                'email'         => 'order@alatulisabadi.com',
                'alamat'        => 'Jl. Pendidikan No. 12, Yogyakarta',
            ],
            [
                'nama_supplier' => 'PT Laboratorium Indonesia',
                'kontak'        => '081388990011',
                'email'         => 'info@labindo.com',
                'alamat'        => 'Jl. Sains No. 56, Semarang',
            ],
            [
                'nama_supplier' => 'CV Jaringan Nusantara',
                'kontak'        => '081399001122',
                'email'         => 'sales@jaringannusantara.com',
                'alamat'        => 'Jl. Teknologi No. 99, Tangerang',
            ],
            [
                'nama_supplier' => 'PT Kendaraan Andalan',
                'kontak'        => '081311223344',
                'email'         => 'info@kendaraanandalan.com',
                'alamat'        => 'Jl. Raya No. 123, Bekasi',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
