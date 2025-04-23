<?php
namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::all(); // Ambil semua data mapel
        return view('akademik.mapel', compact('mapels')); // Tampilkan view index
    }

    public function create()
    {
        return view('akademik.mapel-create'); // Tampilkan form tambah mapel
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'kode_mapel' => 'required|string|max:255',
        ]);

        Mapel::create([
            'nama_mapel' => $request->nama_mapel,
            'kode_mapel' => $request->kode_mapel,
        ]);

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel)
    {
        return view('akademik.mapel-edit', compact('mapel')); // Tampilkan form edit mapel
    }

    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'kode_mapel' => 'required|string|max:255',
        ]);

        $mapel->update([
            'nama_mapel' => $request->nama_mapel,
            'kode_mapel' => $request->kode_mapel,
        ]);

        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }
}