<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainpageController extends Controller
{
    public function bkpage()
    {
        return view('bk');
    }
}
