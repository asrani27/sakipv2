<?php

namespace App\Http\Controllers;

use App\Skpd;
use App\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $data = Jabatan::where('jabatan_id', null)->get();
            $skpd = Skpd::get();
            
            return view('admin.jabatan.index', compact('data','skpd'));
        } elseif (Auth::user()->hasRole('admin')) {
            $data = Auth::user()->skpd;
            
            return view('skpd.jabatan.index', compact('data'));
        }
    }

    public function store(Request $req)
    {
        if(Auth::user()->hasRole('admin')){
            $attr = $req->all();
            $attr['skpd_id'] = Auth::user()->skpd->id;
            $attr['tingkat'] = 1;
            Jabatan::create($attr);
            toastr()->success('Data Berhasil Disimpan');
        }else{
            
            $attr = $req->all();
            $attr['tingkat'] = 1;
            Jabatan::create($attr);
            toastr()->success('Jabatan Berhasil Disimpan');
        }
        return back();
    }

    public function update(Request $req)
    {
        $jabatan = Jabatan::find($req->jabatan_id);
        $attr = $req->all();
        if ($jabatan->atasan == null) {
            $attr['jabatan_id'] = null;
            $jabatan->update($attr);
        } else {
            $attr['jabatan_id'] = $jabatan->atasan->id;
            $jabatan->update($attr);
        }
        toastr()->success('Jabatan Berhasil Diupdate');
        return back();
    }

    public function storeSub(Request $req)
    {
        $tingkat = Jabatan::find($req->jabatan_id)->tingkat;
        
        if(Auth::user()->hasRole('admin')){
            $attr = $req->all();
            $attr['skpd_id'] = Auth::user()->skpd->id;
            $attr['tingkat'] = (int) $tingkat + 1;
            Jabatan::create($attr);
            toastr()->success('Sub Jabatan Berhasil Disimpan');
        }else{
            $attr = $req->all();
            $attr['skpd_id'] = Jabatan::find($req->jabatan_id)->skpd_id;
            $attr['tingkat'] = (int) $tingkat + 1;
            Jabatan::create($attr);
            toastr()->success('Sub Jabatan Berhasil Disimpan');
        }
        return back();

    }

    public function delete($id)
    {
        try {
            Jabatan::find($id)->delete();
            toastr()->info('Jabatan Berhasil Di Hapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena memiliki sub jabatan');
            return back();
        }
    }
    
    public function destroy(Request $req)
    {
        try {
            Jabatan::find($req->jabatan_id)->delete();
            toastr()->success('Jabatan Berhasil Di Hapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena memiliki sub Jabatan');
            return back();
        }
    }
}
