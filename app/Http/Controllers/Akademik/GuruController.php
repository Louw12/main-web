<?php

namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::with('mapel')->get(); // Ambil semua data guru beserta mapelnya
        return view('akademik.guru', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'guru')->get();
        // $users = User::doesntHave('guru')->get(); // Pastikan relasi 'guru' ada di model User
        $mapels = Mapel::all(); // Ambil semua data mapel
        return view('akademik.guru-create', compact('users','mapels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'kode_guru' => 'required|string|max:255|unique:gurus',
            'mapel_id' => 'required|exists:mapels,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'kode_guru' => $request->kode_guru,
            'mapel_id' => $request->mapel_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);
        $mapels = Mapel::all(); // Ambil semua data mapel
        return view('akademik.guru-edit', compact('guru', 'mapels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'kode_guru' => 'required|string|max:255|unique:gurus,kode_guru,' . $guru->id,
            'mapel_id' => 'required|exists:mapels,id',
        ]);

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'kode_guru' => $request->kode_guru,
            'mapel_id' => $request->mapel_id,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
