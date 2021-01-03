<?php

namespace App\Http\Controllers;

use App\Eselon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EselonController extends Controller
{
    public function index()
    {
        $data = Eselon::get();
        return view('admin.eselon.index', compact('data'));
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama' => 'required|unique:eselon|max:255',
        ]);

        if ($validator->fails()) {
            toastr()->error('Data Eselon Sudah Ada');
            return back();
        }
        
        Eselon::create($req->all());
        toastr()->success('Data Eselon Telah Di Simpan');
        return back();
    }
    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama' => 'required|unique:eselon|max:255,'.$req->id_eselon,
        ]);

        if ($validator->fails()) {
            toastr()->error('Data Eselon Sudah Ada');
            return back();
        }
        
        $u = Eselon::find($req->id_eselon);
        $u->nama = $req->nama;
        $u->save();

        toastr()->success('Data Eselon Telah Di Update');
        return back();
    }

    public function delete($id)
    {
        try{
            Eselon::find($id)->delete();
            toastr()->success('Data Eselon Telah Di Hapus');
            return back();
        }catch(\Exception $e){
            toastr()->error('Data Tidak Bisa Di Hapus, Karena Memiliki Relasi Dengan Pegawai');
            return back();
        }
    }
}
