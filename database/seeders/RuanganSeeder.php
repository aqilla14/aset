<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruangan;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangans = [
            [
                'nama_ruangan' => 'Ruang 101',
                'kode_ruangan' => 'R101',
                'lokasi' => 'Gedung A Lantai 1'
            ],
            [
                'nama_ruangan' => 'Ruang 102',
                'kode_ruangan' => 'R102',
                'lokasi' => 'Gedung A Lantai 1'
            ],
            [
                'nama_ruangan' => 'Ruang 103',
                'kode_ruangan' => 'R103',
                'lokasi' => 'Gedung A Lantai 1'
            ],
            [
                'nama_ruangan' => 'Ruang 201',
                'kode_ruangan' => 'R201',
                'lokasi' => 'Gedung A Lantai 2'
            ],
            [
                'nama_ruangan' => 'Ruang 202',
                'kode_ruangan' => 'R202',
                'lokasi' => 'Gedung A Lantai 2'
            ],
            [
                'nama_ruangan' => 'Ruang 203',
                'kode_ruangan' => 'R203',
                'lokasi' => 'Gedung A Lantai 2'
            ],
            [
                'nama_ruangan' => 'Gudang Utama',
                'kode_ruangan' => 'G001',
                'lokasi' => 'Gedung B'
            ],
            [
                'nama_ruangan' => 'Gudang Sekunder',
                'kode_ruangan' => 'G002',
                'lokasi' => 'Gedung B'
            ],
            [
                'nama_ruangan' => 'Ruang Server',
                'kode_ruangan' => 'SRV01',
                'lokasi' => 'Gedung A Lantai 3'
            ],
            [
                'nama_ruangan' => 'Ruang Rapat Utama',
                'kode_ruangan' => 'RR01',
                'lokasi' => 'Gedung A Lantai 2'
            ],
            [
                'nama_ruangan' => 'Ruang Rapat Kecil',
                'kode_ruangan' => 'RR02',
                'lokasi' => 'Gedung A Lantai 1'
            ],
        ];

        foreach ($ruangans as $ruangan) {
            Ruangan::create($ruangan);
        }
    }
}