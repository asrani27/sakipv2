<?php

namespace App\Http\Controllers;

use App\Skpd;
use App\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitKerjaController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {

            $data = UnitKerja::where('unit_kerja_id', null)->get();
            $skpd = Skpd::get();
            
            return view('admin.unitkerja.index', compact('data','skpd'));
        } elseif (Auth::user()->hasRole('admin')) {
            $data = Auth::user()->skpd;
            return view('skpd.unitkerja.index', compact('data'));
        }
    }

    public function store(Request $req)
    {
        if(Auth::user()->hasRole('admin')){
            $attr = $req->all();
            $attr['skpd_id'] = Auth::user()->skpd->id;
            $attr['tingkat'] = 1;
            UnitKerja::create($attr);
            toastr()->success('Data Berhasil Disimpan');
        }else{
            
            $attr = $req->all();
            $attr['tingkat'] = 1;
            UnitKerja::create($attr);
            toastr()->success('Unit Kerja Berhasil Disimpan');
        }
        return back();
    }

    public function update(Request $req)
    {
        $unit_kerja = UnitKerja::find($req->unit_kerja_id);
        $attr = $req->all();
        if ($unit_kerja->atasan == null) {
            $attr['unit_kerja_id'] = null;
            $unit_kerja->update($attr);
        } else {
            $attr['unit_kerja_id'] = $unit_kerja->atasan->id;
            $unit_kerja->update($attr);
        }
        toastr()->success('Unit kerja Berhasil Diupdate');
        return back();
    }

    public function storeSub(Request $req)
    {
        $tingkat = Unitkerja::find($req->unit_kerja_id)->tingkat;
        
        if(Auth::user()->hasRole('admin')){
            $attr = $req->all();
            $attr['skpd_id'] = Auth::user()->skpd->id;
            $attr['tingkat'] = (int) $tingkat + 1;
            UnitKerja::create($attr);
            toastr()->success('Sub Unit Berhasil Disimpan');
        }else{
            $attr = $req->all();
            $attr['skpd_id'] = UnitKerja::find($req->unit_kerja_id)->skpd_id;
            $attr['tingkat'] = (int) $tingkat + 1;
            UnitKerja::create($attr);
            toastr()->success('Sub UnitKerja Berhasil Disimpan');
        }
        return back();
    }

    public function delete($id)
    {
        try {
            UnitKerja::find($id)->delete();
            toastr()->info('UnitKerja Berhasil Di Hapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena memiliki sub UnitKerja');
            return back();
        }
    }
    public function destroy(Request $req)
    {
        try {
            UnitKerja::find($req->unit_kerja_id)->delete();
            toastr()->success('UnitKerja Berhasil Di Hapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena memiliki sub UnitKerja');
            return back();
        }
    }
}
