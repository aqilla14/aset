<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Ruangan;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asets = Aset::with(['kategori', 'ruangan', 'supplier'])->get();
        return view('aset.index', compact('asets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $ruangans  = Ruangan::all();
        $suppliers = Supplier::all(); 
        return view('aset.create', compact('kategoris', 'ruangans', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_aset'         => 'required|unique:asets',
            'nama_aset'         => 'required',
            'kategori_id'       => 'required|exists:kategoris,id',
            'ruangan_id'        => 'required|exists:ruangans,id',
            'supplier_id'       => 'nullable|exists:suppliers,id',
            'status'            => 'required|in:tersedia,dipinjam,rusak,pemeliharaan',
            'tanggal_perolehan' => 'required|date',
            'harga'             => 'required|numeric|min:0',
            'deskripsi'         => 'nullable',
        ]);

        Aset::create($request->all());

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        $aset->load(['kategori', 'ruangan', 'supplier']);
        return view('aset.show', compact('aset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        $kategoris = Kategori::all();
        $ruangans  = Ruangan::all();
        $suppliers = Supplier::all();
        return view('aset.edit', compact('aset', 'kategoris', 'ruangans', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
        $request->validate([
            'kode_aset'         => 'required|unique:asets,kode_aset,' . $aset->id,
            'nama_aset'         => 'required',
            'kategori_id'       => 'required|exists:kategoris,id',
            'ruangan_id'        => 'required|exists:ruangans,id',
            'supplier_id'       => 'nullable|exists:suppliers,id', // ← TAMBAHKAN INI
            'status'            => 'required|in:tersedia,dipinjam,rusak,pemeliharaan',
            'tanggal_perolehan' => 'required|date',
            'harga'             => 'required|numeric|min:0',
            'deskripsi'         => 'nullable',
        ]);

        $aset->update($request->all());

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $aset->delete();

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil dihapus!');
    }
}
