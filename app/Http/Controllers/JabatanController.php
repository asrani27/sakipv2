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
            $data = Skpd::all();
            return view('admin.jabatan.index', compact('data'));
        } elseif (Auth::user()->hasRole('admin')) {
            $data = Auth::user()->skpd;
            return view('skpd.jabatan.index', compact('data'));
        }
    }

    public function store(Request $req)
    {
        Jabatan::create($req->all());
        toastr()->success('Jabatan Berhasil Disimpan');
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
        $attr = $req->all();
        $attr['skpd_id'] = Jabatan::find($req->jabatan_id)->skpd_id;
        Jabatan::create($attr);
        toastr()->success('Sub Jabatan Berhasil Disimpan');
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
}
