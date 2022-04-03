<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\KinerjaTriwulan;
use App\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KinerjaTriwulanController extends Controller
{
    public function index()
    {
        $data = StrukturOrganisasi::where('skpd_id', Auth::user()->skpd->id)->orderBy('tingkat', 'ASC')->get();
        return view('admin.kinerjatriwulan.index', compact('data'));
    }

    public function kinerja($id)
    {
        $jabatan = Jabatan::find($id);
        return view('admin.kinerjatriwulan.kinerja', compact('jabatan', 'id'));
        // if ($jabatan->tingkat == 1) {
        //     //Dinas

        // } elseif ($jabatan->tingkat == 2) {
        //     //Bidang
        // } elseif ($jabatan->tingkat == 3) {
        //     //Seksi
        // } else {
        //     //Staff
        // }
        // dd($jabatan);
    }

    public function addTahun($id)
    {
        $jabatan = Jabatan::find($id);
        return view('admin.kinerjatriwulan.tahun.add', compact('jabatan', 'id'));
    }

    public function storeTahun(Request $req, $id)
    {
        dd($req->all());
        $check = KinerjaTriwulan::where('jabatan_id', $id)->where('tahun', $req->tahun)->where('triwulan', $req->triwulan)->first();
        if ($check == null) {
            $n = new KinerjaTriwulan;
        } else {
            toastr()->error('Tahun dan Triwulan Sudah Ada');
            return back();
        }
    }
}
