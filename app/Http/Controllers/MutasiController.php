<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        return view('skpd.mutasi.index');
    }
}
