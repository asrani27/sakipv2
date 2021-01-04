<?php

namespace App\Http\Controllers;

use App\Iku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IkuController extends Controller
{
    protected $jabatan;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->jabatan = Auth::user()->pegawai->unitkerja;
            return $next($request);
        });
    }
    public function index()
    {
        $data = Iku::where('unit_kerja_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->get();
        return view('pegawai.iku.index', compact('data'));
    }

    public function add()
    {
        $jabatan = $this->jabatan;
        return view('pegawai.iku.add', compact('jabatan'));
    }

    public function store(Request $req)
    {
        Iku::create($req->all());
        toastr()->success('IKU Berhasil Disimpan');
        return redirect('/pegawai/iku');
    }

    public function update(Request $req, $id)
    {
        Iku::find($id)->update($req->all());
        toastr()->success('IKU Berhasil Diupdate');
        return redirect('/pegawai/iku');
    }

    public function edit($id)
    {
        $jabatan = $this->jabatan;
        $data = Iku::find($id);
        return view('pegawai.iku.edit', compact('jabatan', 'data'));
    }

    public function delete($id)
    {
        Iku::find($id)->delete();
        toastr()->success('IKU Berhasil DiHapus');
        return back();
    }

    public function verifIKU($id)
    {   
        $u = Iku::find($id);
        $u->verifikasi = 1;
        $u->save();
        toastr()->success('IKU Disetujui');
        return back(); 

    }
}
