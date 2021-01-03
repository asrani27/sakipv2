<?php

namespace App\Http\Controllers;

use App\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $data = Periode::all();
        return view('admin.periode.index', compact('data'));
    }

    public function add()
    {
        return view('admin.periode.add');
    }

    public function edit()
    {
        return view('admin.periode.edit');
    }

    public function store(Request $req)
    {
        $attr = $req->all();
        $attr['kode_periode'] = $req->mulai . $req->sampai;
        Periode::create($attr);
        toastr()->success('Periode Berhasil DiSimpan');
        return back();
    }

    public function update(Request $req)
    {
        $attr = $req->all();
        $attr['kode_periode'] = $req->mulai . $req->sampai;
        Periode::find($req->id_periode)->update($attr);
        toastr()->success('Periode Berhasil DiUpdate');
        return back();
    }

    public function delete($id)
    {
        try {
            Periode::find($id)->delete();
            toastr()->success('Periode Berhasil Dihapus');
            return back();
        } catch (\Exception $e) {
            toastr()->info('Tidak Bisa Di Hapus');
            return back();
        }
    }

    public function aktifkan($id)
    {
        $check = Periode::where('is_aktif', 1)->first();
        if($check == null){
            $u = Periode::find($id);
            $u->is_aktif = 1;
            $u->save();
            return back();
        }else{
            $check->is_aktif = 0;
            $check->save();

            $u = Periode::find($id);
            $u->is_aktif = 1;
            $u->save();
            return back();
        }
    }
}
