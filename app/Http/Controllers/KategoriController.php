<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris',
            'deskripsi'     => 'nullable',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategoriAset)
    {
        return view('kategori.show', compact('kategoriAset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategoriAset)
    {
        return view('kategori.edit', compact('kategoriAset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategoriAset)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori,' . $kategoriAset->id,
            'deskripsi'     => 'nullable',
        ]);

        $kategoriAset->update($request->all());

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategoriAset)
    {
        $kategoriAset->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
