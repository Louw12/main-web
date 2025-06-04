<?php

namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Studen;

class StudenController extends Controller
{
    public function index()
    {
        $students = Studen::all();
        return view('akademik.studen', compact('students')); 
    }

    public function create()
    {
        return view('akademik.studen-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:50|unique:studen,nisn', // Diperbaiki: tambah unique dan max diperbesar
            'gender' => 'required|in:L,P',
            'tgl_lahir' => 'required|date',
        ]);
        
        // Hapus baris yang tidak perlu
        // $students = Studen::all(); // DIHAPUS - tidak diperlukan
        
        // Perbaikan: gunakan only() untuk mengambil field yang dibutuhkan saja
        Studen::create($request->only(['name', 'nisn', 'gender', 'tgl_lahir']));
        
        return redirect()->route('akademik.studen.index')->with('success', 'Siswa berhasil dibuat.');
    }

    public function edit($id)
    {
        $student = Studen::findOrFail($id);
        return view('akademik.studen-edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Studen::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:50|unique:studen,nisn,' . $student->id,
            'gender' => 'required|in:L,P', // Diperbaiki: konsisten dengan store method
            'tgl_lahir' => 'required|date',
        ]);
        
        // Perbaikan: gunakan only() untuk keamanan
        $student->update($request->only(['name', 'nisn', 'gender', 'tgl_lahir']));
        
        return redirect()->route('akademik.studen.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $student = Studen::findOrFail($id);
        $student->delete();
        
        return redirect()->route('akademik.studen.index')->with('success', 'Siswa berhasil dihapus.');
    }
}