<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Create a new Berita instance
        $berita = new Berita();

        // Set the properties
        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul);
        $berita->isi = $request->isi;
        $berita->status = $request->status ?? 'draft';
        $berita->user_id = auth()->id();

        // If there is a file, store it in the public/berita directory
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/berita', $filename);
            $berita->gambar = 'storage/berita/' . $filename;
        }

        // Save the berita
        $berita->save();

        // Return a redirect with a message
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function showPublic($slug)
    {
        $berita = Berita::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('berita.showpublic', compact('berita'));
    }
    public function listPublic()
    {
        $berita = Berita::published()->latest()->paginate(9);
        return view('berita', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Update the properties
        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul);
        $berita->isi = $request->isi;
        $berita->status = $request->status;

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($berita->gambar && Storage::exists(str_replace('storage/', 'public/', $berita->gambar))) {
                Storage::delete(str_replace('storage/', 'public/', $berita->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/berita', $filename);
            $berita->gambar = 'storage/berita/' . $filename;
        }

        // Save the berita
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Delete image if exists
        if ($berita->gambar && Storage::exists(str_replace('storage/', 'public/', $berita->gambar))) {
            Storage::delete(str_replace('storage/', 'public/', $berita->gambar));
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}