<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Tupoksi;
use App\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TupoksiController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        if (Auth::user()->hasRole('pegawai')) {
            if (Auth::user()->pegawai->unitkerja == null) {
                $data = Auth::user()->pegawai->unitkerja;
            } else {
                $data = Auth::user()->pegawai->unitkerja;
            }
            return view('pegawai.tupoksi.index', compact('data'));
        } else {
            $data = UnitKerja::where('skpd_id', Auth::user()->skpd->id)->get();
            return view('skpd.tupoksi.index', compact('data'));
        }
    }

    public function storeTugas(Request $req, $id)
    {
        $attr = $req->all();
        if (Auth::user()->hasRole('pegawai')) {
            $attr['skpd_id'] = $this->user->pegawai->skpd->id;
        } else {
            $attr['skpd_id'] = $this->user->skpd->id;
        }
        $attr['unit_kerja_id'] = $id;
        $attr['jenis'] = 1;
        Tupoksi::create($attr);
        toastr()->success('Tugas Berhasil Disimpan');
        return back();
    }

    public function addTugas($id)
    {
        $jabatan = UnitKerja::find($id);
        $data = $jabatan->tugas;
        if (Auth::user()->hasRole('pegawai')) {
            return view('pegawai.tupoksi.add', compact('data', 'jabatan'));
        } else {
            return view('skpd.tupoksi.add', compact('data', 'jabatan'));
        }
    }

    public function addFungsi($id)
    {
        $jabatan = UnitKerja::find($id);
        $data = $jabatan->fungsi;
        if (Auth::user()->hasRole('pegawai')) {
            return view('pegawai.tupoksi.addf', compact('data', 'jabatan'));
        } else {
            return view('skpd.tupoksi.addf', compact('data', 'jabatan'));
        }
    }

    public function storeFungsi(Request $req, $id)
    {
        $attr = $req->all();
        if (Auth::user()->hasRole('pegawai')) {
            $attr['skpd_id'] = $this->user->pegawai->skpd->id;
        } else {
            $attr['skpd_id'] = $this->user->skpd->id;
        }
        $attr['unit_kerja_id'] = $id;
        $attr['jenis'] = 2;
        Tupoksi::create($attr);
        return back();
    }

    public function deleteFungsi($id)
    {
        Tupoksi::find($id)->delete();
        toastr()->success('Tugas Berhasil Di Hapus');
        return back();
    }

    public function editTugas($id)
    {
        $tugas = Tupoksi::find($id);
        $jabatan = UnitKerja::find($tugas->unit_kerja_id);
        $data = $jabatan->tugas;
        if (Auth::user()->hasRole('pegawai')) {
            return view('pegawai.tupoksi.edit', compact('data', 'tugas', 'jabatan'));
        } else {
            return view('skpd.tupoksi.edit', compact('data', 'tugas', 'jabatan'));
        }
    }

    public function updateTugas(Request $req, $id)
    {
        $attr = $req->all();
        $t = Tupoksi::find($id)->update($attr);
        $d = Tupoksi::find($id)->unit_kerja_id;
        toastr()->success('Tugas Berhasil DiUpdate');
        if (Auth::user()->hasRole('pegawai')) {
            return redirect('/pegawai/tugas/add/' . $d);
        } else {
            return redirect('/admin_skpd/tugas/add/' . $d);
        }
    }

    public function deleteTugas($id)
    {
        Tupoksi::find($id)->delete();
        toastr()->success('Tugas Berhasil Di Hapus');
        return back();
    }

    public function editFungsi($id)
    {
        $fungsi = Tupoksi::find($id);
        $jabatan = UnitKerja::find($fungsi->unit_kerja_id);
        $data = $jabatan->fungsi;
        if (Auth::user()->hasRole('pegawai')) {
            return view('pegawai.tupoksi.editf', compact('data', 'fungsi', 'jabatan'));
        } else {
            return view('skpd.tupoksi.editf', compact('data', 'fungsi', 'jabatan'));
        }
    }

    public function updateFungsi(Request $req, $id)
    {
        $attr = $req->all();
        $t = Tupoksi::find($id)->update($attr);
        $d = Tupoksi::find($id)->unit_kerja_id;
        if (Auth::user()->hasRole('pegawai')) {
            return redirect('/pegawai/fungsi/add/' . $d);
        } else {
            return redirect('/admin_skpd/fungsi/add/' . $d);
        }
    }
}
