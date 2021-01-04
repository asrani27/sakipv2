<?php

namespace App\Http\Controllers;

use App\RencanaAksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RAController extends Controller
{
    public function index()
    {
        if(Auth::user()->pegawai->unitkerja->unit_kerja_id == null){
            $data = Auth::user()->pk()->map(function($item){
                return $item->rencana_aksi;
            });
        }else{
            $checkkadis = Auth::user()->pegawai->unitkerja->atasan;
            if($checkkadis->unit_kerja_id == null){
                $data = $checkkadis->pk->map(function($item){
                    return $item->rencana_aksi;
                });
            }else{
                $data = Auth::user()->pk()->map(function($item){
                    return $item->rencana_aksi;
                });
            }
        }
        return view('pegawai.ra.index',compact('data'));
    }
    
    public function add()
    {
        $data_pk = Auth::user()->pk();
        return view('pegawai.ra.add',compact('data_pk'));
    }

    public function add2($id)
    {
        $data_pk = Auth::user()->pk();
        return view('pegawai.ra.add2',compact('data_pk', 'id'));
    }

    public function store(Request $req)
    {
        RencanaAksi::create($req->all());
        return redirect('/pegawai/rencana-aksi');
    }

    public function store2(Request $req, $id)
    {
        $attr = $req->all();
        $attr['rencana_aksi_id'] = $id;
        RencanaAksi::create($attr);
        return redirect('/pegawai/rencana-aksi');

    }
}
