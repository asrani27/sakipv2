<?php

namespace App\Http\Controllers;

use App\Iku;
use App\IkuKota;
use App\UnitKerja;
use App\IndikatorIkuKota;
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
    public function iku()
    {
        $data = IkuKota::paginate(10);
        return view('walikota.iku.index',compact('data'));
    }

    public function addIku()
    {
        return view('walikota.iku.add');
    }

    public function storeIku(Request $req)
    {
        IkuKota::create($req->all());
        toastr()->success('IKU walikota Berhasil Disimpan');
        return redirect('/walikota/iku');
    }

    public function updateIku(Request $req, $id)
    {
        IkuKota::find($id)->update($req->all());
        toastr()->success('IKU walikota Berhasil Diupdate');
        return redirect('/walikota/iku');
    }

    public function editIku($id)
    {
        $data = IkuKota::find($id);
        return view('walikota.iku.edit', compact('data'));
    }

    public function edit_indikator($id)
    {
        $data = IndikatorIkuKota::find($id);
        return view('walikota.iku.edit_indikator', compact('data'));
    }

    public function add_indikator($id)
    {
        $data = IkuKota::find($id);
        return view('walikota.iku.add_indikator',compact('data'));
    }

    public function store_indikator(Request $req, $id)
    {
        $attr['iku_kota_id'] = $id;
        $attr['indikator'] = $req->indikator_kinerja_utama;
        
        IndikatorIkuKota::create($attr);

        toastr()->success('Indikator Disimpan');

        return redirect('/walikota/iku');
        
    }

    public function update_indikator(Request $req, $id)
    {

        $data = IndikatorIkuKota::find($id);
        $data->indikator = $req->indikator;
        $data->save();
        toastr()->success('IKU walikota Indikator Diupdate');

        return redirect('/walikota/iku');
    }

    public function deleteIku($id)
    {
        IkuKota::find($id)->delete();
        toastr()->success('IKU walikota Berhasil DiHapus');
        return back();
    }
    public function hapus_indikator($id)
    {
        IndikatorIkuKota::find($id)->delete();
        toastr()->success('Indikator Dihapus');
        return back();
    }
}
