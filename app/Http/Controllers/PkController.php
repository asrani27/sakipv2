<?php

namespace App\Http\Controllers;

use App\Pk;
use App\Pk_indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PkController extends Controller
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
        $data = Pk::where('unit_kerja_id', $this->jabatan->id)->get();
        return view('pegawai.pk.index', compact('data'));
    }

    public function add()
    {
        $jabatan = $this->jabatan;
        return view('pegawai.pk.add', compact('jabatan'));
    }

    public function edit($id)
    {
        $jabatan = $this->jabatan;
        $data = Pk::find($id);
        return view('pegawai.pk.edit', compact('jabatan', 'data'));
    }

    public function editIndikator($id)
    {
        $jabatan = $this->jabatan;
        $data = Pk_indikator::find($id);
        
        return view('pegawai.pk.edit_indikator', compact('jabatan', 'data'));
    }
    public function store(Request $req)
    {
        Pk::create($req->all());
        toastr()->success('PK Berhasil Disimpan');
        return redirect('/pegawai/pk');
    }

    public function updateIndikator(Request $req, $id)
    {
        Pk_indikator::find($id)->update($req->all());
        toastr()->success('Indikator & Target Berhasil Diupdate');
        return redirect('/pegawai/pk');
    }

    public function update(Request $req, $id)
    {
        Pk::find($id)->update($req->all());
        toastr()->success('PK Berhasil Diupdate');
        return redirect('/pegawai/pk');
    }
    public function indikator($id)
    {
        $data = Pk::find($id);
        return view('pegawai.pk.add_indikator', compact('data'));
    }

    public function storeIndikator(Request $req, $id)
    {
        $attr = $req->all();
        $attr['pk_id'] = $id;
        Pk_indikator::create($attr);
        toastr()->success('Indikator Kinerja Berhasil Disimpan');
        return redirect('/pegawai/pk');
    }

    public function delete($id)
    {
        try {
            Pk::find($id)->delete();
            toastr()->success('PK Berhasil Di hapus');
            return redirect('/pegawai/pk');
        } catch (\Exception $e) {
            toastr()->error('Tidak Bisa Di Hapus, Hapus terlebih Dahulu Indikator Dan Target PK');
            return back();
        }
    }

    public function deleteIndikator($id)
    {
        Pk_indikator::find($id)->delete();
        toastr()->success('indikator Berhasil Di hapus');
        return redirect('/pegawai/pk');
    }
}
