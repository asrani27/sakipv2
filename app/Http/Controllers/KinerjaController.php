<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KinerjaController extends Controller
{
    public function kinerjaTriwulan()
    {
        return view('pegawai.kinerjatriwulan.index');
    }
}
