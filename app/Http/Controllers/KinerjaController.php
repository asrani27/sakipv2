<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KinerjaController extends Controller
{
    public function kinerjaTriwulan()
    {
        toastr()->info('Dalam Perbaikan');
        return back();
        //return view('pegawai.kinerjatriwulan.index');
    }
}
