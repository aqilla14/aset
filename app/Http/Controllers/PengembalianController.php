<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalians = Pengembalian::with('peminjaman.aset')->get();
        return view('pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peminjamans = Peminjaman::where('status', 'dipinjam')->with('aset')->get();
        return view('pengembalian.create', compact('peminjamans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id'   => 'required|exists:peminjamans,id',
            'tanggal_kembali' => 'required|date',
            'kondisi'         => 'required|in:baik,rusak_ringan,rusak_berat',
            'catatan'         => 'nullable',
        ]);

        Pengembalian::create($request->all());

        // Update status peminjaman
        Peminjaman::where('id', $request->peminjaman_id)->update(['status' => 'kembali']);

        // Update status aset
        $peminjaman = Peminjaman::find($request->peminjaman_id);
        Aset::where('id', $peminjaman->aset_id)->update(['status' => 'tersedia']);

        return redirect()->route('pengembalian.index')
            ->with('success', 'Pengembalian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        return view('pengembalian.show', compact('pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        $peminjamans = Peminjaman::with('aset')->get();
        return view('pengembalian.edit', compact('pengembalian', 'peminjamans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $request->validate([
            'peminjaman_id'   => 'required|exists:peminjamans,id',
            'tanggal_kembali' => 'required|date',
            'kondisi'         => 'required|in:baik,rusak_ringan,rusak_berat',
            'catatan'         => 'nullable',
        ]);

        $pengembalian->update($request->all());

        return redirect()->route('pengembalian.index')
            ->with('success', 'Pengembalian berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')
            ->with('success', 'Pengembalian berhasil dihapus!');
    }
}
