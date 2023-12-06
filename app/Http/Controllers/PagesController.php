<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $allBerita = Berita::get();
        return view('pages.home', compact('allBerita'));
    }
    public function detail($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.detail', compact('berita'));
    }
}
