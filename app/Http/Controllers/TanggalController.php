<?php

namespace App\Http\Controllers;

use App\TanggalInput;
use Illuminate\Http\Request;

class TanggalController extends Controller
{
    public function index()
    {
        $data = TanggalInput::get();
        return view('admin.input_tanggal.index',compact('data'));
    }
}
