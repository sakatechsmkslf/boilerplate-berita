<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $berita = Berita::with('tags')->latest()->take(6)->get(); // mengambil 6 berita terbaru
        return view('home', compact('berita'));
    }
}
