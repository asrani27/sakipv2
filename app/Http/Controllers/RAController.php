<?php

namespace App\Http\Controllers;

use App\RencanaAksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RAController extends Controller
{
    public function index()
    {
        $data = Auth::user()->pk()->map(function($item){
            return $item->rencana_aksi;
        });
        
        return view('pegawai.ra.index',compact('data'));
    }
    
    public function add()
    {
        $data_pk = Auth::user()->pk();
        return view('pegawai.ra.add',compact('data_pk'));
    }

    public function store(Request $req)
    {
        RencanaAksi::create($req->all());
        return redirect('/pegawai/rencana-aksi');
    }
}
