<?php

namespace App\Http\Controllers;

use App\Iku;
use App\UnitKerja;
use Illuminate\Http\Request;

class WalikotaController extends Controller
{
    public function lihatIKU($id)
    {
        $data = UnitKerja::find($id);
        return view('walikota.lihat_iku',compact('data'));
    }
    
    public function verifIKU($id)
    {
        $data = Iku::where('unit_kerja_id', $id)->where('verifikasi', 0)->get();
        foreach ($data as $item)
        {
            $item->verifikasi = 1;
            $item->save();
        }
        return back();
    }
    
}
