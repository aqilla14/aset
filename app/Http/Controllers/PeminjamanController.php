<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamans = Peminjaman::with('aset')->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asets = Aset::where('status', 'tersedia')->get();
        return view('peminjaman.create', compact('asets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'aset_id'                 => 'required|exists:asets,id',
            'peminjam'                => 'required',
            'nip_nim'                 => 'required',
            'tanggal_pinjam'          => 'required|date',
            'tanggal_kembali_rencana' => 'required|date|after:tanggal_pinjam',
            'keterangan'              => 'nullable',
        ]);

        $peminjaman = Peminjaman::create($request->all());

        // Update status aset
        Aset::where('id', $request->aset_id)->update(['status' => 'dipinjam']);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $asets = Aset::all();
        return view('peminjaman.edit', compact('peminjaman', 'asets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'aset_id'                 => 'required|exists:asets,id',
            'peminjam'                => 'required',
            'nip_nim'                 => 'required',
            'tanggal_pinjam'          => 'required|date',
            'tanggal_kembali_rencana' => 'required|date|after:tanggal_pinjam',
            'keterangan'              => 'nullable',
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        // Update status aset jadi tersedia
        Aset::where('id', $peminjaman->aset_id)->update(['status' => 'tersedia']);

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dihapus!');
    }
}
