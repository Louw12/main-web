<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainpageController extends Controller
{
    public function bkpage()
    {
        return view('bk');
    }

    public function landing()
    {
        $berita = \App\Models\Berita::published()->latest()->limit(6)->get();
        return view('landing', compact('berita'));
    }
}
