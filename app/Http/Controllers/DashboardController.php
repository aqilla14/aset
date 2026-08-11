<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Pemeliharaan;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAset    = Aset::count();
        $tersedia     = Aset::where('status', 'tersedia')->count();
        $dipinjam     = Aset::where('status', 'dipinjam')->count();
        $rusak        = Aset::where('status', 'rusak')->count();
        $pemeliharaan = Aset::where('status', 'pemeliharaan')->count();

        $kategoriCount = Aset::select('kategori_id')
            ->with('kategori')
            ->selectRaw('count(*) as total')
            ->groupBy('kategori_id')
            ->get();

        $ruanganCount = Aset::select('ruangan_id')
            ->with('ruangan')
            ->selectRaw('count(*) as total')
            ->groupBy('ruangan_id')
            ->get();

        $peminjamanTerbaru = Peminjaman::with('aset')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $pemeliharaanTerbaru = Pemeliharaan::with('aset')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $asetTerbaru = Aset::with(['kategori', 'ruangan'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalAset',
            'tersedia',
            'dipinjam',
            'rusak',
            'pemeliharaan',
            'kategoriCount',
            'ruanganCount',
            'peminjamanTerbaru',
            'pemeliharaanTerbaru',
            'asetTerbaru'
        ));
    }
}
