<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::with('kategori')->latest()->get();
        $kategori = Kategori::all();
        return view('berita.index', compact('berita', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('berita.create', compact('kategori', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|min:5|max:255',
            'isi' => 'required|string|min:10',
            'path_gambar' => 'nullable|image|mimes:jpeg,png,jpg,heic',
            'tgl_publish' => 'required|date',
            'status' => 'required|in:pending,done',
            'kategori_id' => 'required|exists:kategori,id',
            'tag_id' => 'required|array|min:1', // ✅
            'tag_id.*' => 'exists:tag,id',
        ]);

        $data = $request->only(['judul', 'isi', 'tgl_publish', 'status', 'kategori_id']);

        if ($request->hasFile('path_gambar')) {
            $data['path_gambar'] = $request->file('path_gambar')->store('berita', 'public');
        }

        if (!$request->has('tag_id')) {
            return back()->withErrors(['tag_id' => 'Minimal pilih satu tag'])->withInput();
        }

        $berita = Berita::create($data);
        $berita->tags()->attach($request->tag_id);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        $berita->load('tags');
        return view('berita.edit', compact('berita', 'kategori', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'path_gambar' => 'nullable|image|mimes:jpeg,png,jpg',
            'tgl_publish' => 'required|date',
            'status' => 'required|in:pending,done',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $data = $request->only(['judul', 'isi', 'tgl_publish', 'status', 'kategori_id']);

        if ($request->hasFile('path_gambar')) {
            if ($berita->path_gambar) {
                Storage::disk('public')->delete($berita->path_gambar);
            }
            $data['path_gambar'] = $request->file('path_gambar')->store('berita', 'public');
        }

        $berita->update($data);
        $berita->tags()->sync($request->tag_id);
        return redirect()->route('berita.index')->with('success', 'Berita diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        if ($berita->path_gambar) {
            Storage::disk('public')->delete($berita->path_gambar);
        }
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita dihapus.');
    }
}
