<?php

namespace App\Http\Controllers;

use App\Skpd;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $skpdArr = Skpd::pluck('nama')->toArray();
        return view('admin.home',compact('skpdArr'));
    }
}
