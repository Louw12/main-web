<?php

namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Studen;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Akademik\StudenController;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('akademik.kelas', compact('kelas'));
  }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akademik.kelas-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kode_kelas' => 'required|string|max:50|unique:kelas,kode_kelas',
        ]);

        $kelas = new Kelas();
        Kelas::create($request->all());
        return redirect()->back()->with('success', 'Kelas berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kode_kelas)
    {
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->firstOrFail();
        return view('akademik.kelas-edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kode_kelas' => 'required|string|max:50|unique:kelas,kode_kelas,' . $id,
        ]);

        $kelas = Kelas::where('kode_kelas',$kode_kelas);
        $kelas->update($request->all());
        return redirect()->back()->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_kelas)
    {
        $kelas = Kelas::findOrFail('kode_kelas', $kode_kelas);
        $kelas->delete();
        return redirect()->route('akademik.kelas')->with('success', 'Kelas berhasil dihapus.');
    }
}
