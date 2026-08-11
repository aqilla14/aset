<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeliharaans = Pemeliharaan::with('aset')->get();
        return view('pemeliharaan.index', compact('pemeliharaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asets = Aset::all();
        return view('pemeliharaan.create', compact('asets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'aset_id'              => 'required|exists:asets,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan'   => 'required',
            'biaya'                => 'required|numeric|min:0',
            'keterangan'           => 'nullable',
        ]);

        Pemeliharaan::create($request->all());

        // Update status aset
        Aset::where('id', $request->aset_id)->update(['status' => 'pemeliharaan']);

        return redirect()->route('pemeliharaan.index')
            ->with('success', 'Pemeliharaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemeliharaan $pemeliharaan)
    {
        return view('pemeliharaan.show', compact('pemeliharaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemeliharaan $pemeliharaan)
    {
        $asets = Aset::all();
        return view('pemeliharaan.edit', compact('pemeliharaan', 'asets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemeliharaan $pemeliharaan)
    {
        $request->validate([
            'aset_id'              => 'required|exists:asets,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan'   => 'required',
            'biaya'                => 'required|numeric|min:0',
            'keterangan'           => 'nullable',
        ]);

        $pemeliharaan->update($request->all());

        return redirect()->route('pemeliharaan.index')
            ->with('success', 'Pemeliharaan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemeliharaan $pemeliharaan)
    {
        // Update status aset jadi tersedia
        Aset::where('id', $pemeliharaan->aset_id)->update(['status' => 'tersedia']);

        $pemeliharaan->delete();

        return redirect()->route('pemeliharaan.index')
            ->with('success', 'Pemeliharaan berhasil dihapus!');
    }
}
