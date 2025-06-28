<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = Tag::all();
        return view('tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tag' => 'required|string:min:3',
        ]);

        Tag::create([
            'nama_tag' => $request->nama_tag
        ]);
        return redirect()->route('tag.index')->with('success', 'Tag Berhasil ditambahkaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'nama_tag' => 'required|string',
        ]);

        $tag->update([
            'nama_tag' => $request->nama_tag
        ]);
        return redirect()->route('tag.index')->with('success', 'Tag berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index')->with('success', 'Tag Berhasil dihapus');
    }
}
