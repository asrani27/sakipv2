<?php

namespace App\Http\Controllers;

use App\Pangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PangkatController extends Controller
{
    public function index()
    {
        $data = Pangkat::get();
        return view('admin.pangkat.index', compact('data'));
    }

    
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama' => 'required|unique:pangkat|max:255',
        ]);

        if ($validator->fails()) {
            toastr()->error('Data Pangkat Sudah Ada');
            return back();
        }
        
        Pangkat::create($req->all());
        toastr()->success('Data Pangkat Telah Di Simpan');
        return back();
    }
    public function update(Request $req)
    {
        // $validator = Validator::make($req->all(), [
        //     'nama' => 'required|unique:pangkat|max:255',
        // ]);

        // if ($validator->fails()) {
        //     toastr()->error('Data Pangkat Sudah Ada');
        //     return back();
        // }
        
        $u = Pangkat::find($req->id_pangkat);
        $u->nama = $req->nama;
        $u->golongan = $req->golongan;
        $u->save();

        toastr()->success('Data Pangkat Telah Di Update');
        return back();
    }

    public function delete($id)
    {
        try{
            Pangkat::find($id)->delete();
            toastr()->success('Data Pangkat Telah Di Hapus');
            return back();
        }catch(\Exception $e){
            toastr()->error('Data Tidak Bisa Di Hapus, Karena Memiliki Relasi Dengan Pegawai');
            return back();
        }
    }
}
