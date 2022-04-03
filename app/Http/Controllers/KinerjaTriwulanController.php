<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Kinerja;
use App\KinerjaTriwulan;
use App\KinerjaIndikator;
use App\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KinerjaTriwulanController extends Controller
{
    public function isMine($param)
    {
    }
    public function index()
    {
        $data = StrukturOrganisasi::where('skpd_id', Auth::user()->skpd->id)->orderBy('tingkat', 'ASC')->get();
        return view('admin.kinerjatriwulan.index', compact('data'));
    }

    public function kinerja($id)
    {
        $skpd_id = Jabatan::find($id)->skpd_id;

        if (Auth::user()->skpd->id != $skpd_id) {
            toastr()->error('Bukan Milik Anda');
            return back();
        } else {
            $jabatan = Jabatan::find($id);
            $data = KinerjaTriwulan::where('jabatan_id', $id)->orderBy('tahun', 'DESC')->orderBy('triwulan', 'ASC')->get();
            return view('admin.kinerjatriwulan.kinerja', compact('jabatan', 'id', 'data'));
        }
    }

    public function detailKinerja($id, $kinerja_id)
    {
        $jabatan = Jabatan::find($id);
        $tahun = KinerjaTriwulan::find($kinerja_id);
        $kinerja = Kinerja::where('kinerja_triwulan_id', $kinerja_id)->get();
        return view('admin.kinerjatriwulan.kinerja.index', compact('jabatan', 'id', 'tahun', 'kinerja_id', 'kinerja'));
    }
    public function addKinerja($id, $kinerja_id)
    {
        $jabatan = Jabatan::find($id);
        $tahun_triwulan = KinerjaTriwulan::find($kinerja_id);
        if ($jabatan->tingkat == 1) {
            //Dinas
            return view('admin.kinerjatriwulan.kinerja.add', compact('jabatan', 'id', 'tahun_triwulan', 'kinerja_id'));
        } else {
            //Bidang

            $kinerja_atasan = KinerjaTriwulan::where('jabatan_id', $jabatan->atasan->id)->where('tahun', $tahun_triwulan->tahun)->where('triwulan', $tahun_triwulan->triwulan)->first()->kinerja;


            return view('admin.kinerjatriwulan.kinerja.add2', compact('jabatan', 'id', 'tahun_triwulan', 'kinerja_id', 'kinerja_atasan'));
        }
    }

    public function storeKinerja(Request $req, $id, $kinerja_id)
    {
        $jabatan = Jabatan::find($id);

        if (Auth::user()->skpd->id != $jabatan->skpd_id) {
            toastr()->error('Jabatan ini tidak berada di SKPD ini');
            return back();
        } else {

            $n = new Kinerja;
            $n->kinerja_triwulan_id = $kinerja_id;
            $n->isi = $req->kinerja;
            $n->skpd_id = Auth::user()->skpd->id;
            $n->jabatan_id = $jabatan->id;
            if ($req->kinerja_uuid != null) {
                $n->kinerja_id = $req->kinerja_uuid;
            }
            $n->save();
            toastr()->success('Berhasil Disimpan');
            return redirect('/admin_skpd/kinerjatriwulan/struktur/' . $id . '/kinerja/' . $kinerja_id);
        }
    }

    public function editKinerja($id, $kinerja_id)
    {
        $jabatan = Jabatan::find($id);
        $kinerja = Kinerja::find($kinerja_id);
        return view('admin.kinerjatriwulan.kinerja.edit', compact('jabatan', 'id', 'kinerja', 'kinerja_id'));
    }

    public function updateKinerja(Request $req, $id, $kinerja_id)
    {
        $skpd_id = Jabatan::find($id)->skpd_id;
        if (Auth::user()->skpd->id != $skpd_id) {
            toastr()->error('Jabatan ini tidak berada di SKPD ini');
            return back();
        } else {
            $n = Kinerja::find($kinerja_id);
            $n->isi = $req->kinerja;
            $n->save();

            toastr()->success('Berhasil Diupdate');
            return redirect('/admin_skpd/kinerjatriwulan/struktur/' . $id . '/kinerja/' . $n->kinerja_triwulan_id);
        }
    }
    public function destroyKinerja($id, $kinerja_id)
    {
        $skpd_id = Jabatan::find($id)->skpd_id;
        if (Auth::user()->skpd->id != $skpd_id) {
            toastr()->error('Jabatan ini tidak berada di SKPD ini');
            return back();
        } else {
            Kinerja::find($kinerja_id)->delete();
            toastr()->success('Berhasil Dihapus');
            return back();
        }
    }

    public function addIndikator($id, $kinerja_id)
    {
        $jabatan = Jabatan::find($id);
        $kinerja = Kinerja::find($kinerja_id);
        return view('admin.kinerjatriwulan.indikator.add', compact('jabatan', 'id', 'kinerja'));
    }
    public function storeIndikator(Request $req, $id, $kinerja_id)
    {
        $jabatan = Jabatan::find($id);
        $kinerja = Kinerja::find($kinerja_id);

        if (Auth::user()->skpd->id != $jabatan->skpd_id) {
            toastr()->error('Jabatan ini tidak berada di SKPD ini');
            return back();
        } else {
            $n = new KinerjaIndikator;
            $n->kinerja_id = $kinerja->id;
            $n->kinerja_triwulan_id = $kinerja->kinerja_triwulan_id;
            $n->skpd_id = Auth::user()->skpd->id;

            $n->indikator = $req->indikator;
            $n->satuan = $req->satuan;
            $n->target = $req->target;
            $n->tw1 = $req->tw1;
            $n->tw2 = $req->tw2;
            $n->tw3 = $req->tw3;
            $n->tw4 = $req->tw4;
            $n->realisasi = $req->realisasi;
            $n->capaian = $req->capaian;
            $n->save();
            toastr()->success('Berhasil Disimpan');
            return redirect('/admin_skpd/kinerjatriwulan/struktur/' . $id . '/kinerja/' . $kinerja->kinerja_triwulan_id);
        }
    }
    public function destroyIndikator($id, $indikator_id)
    {
        $skpd_id = Jabatan::find($id)->skpd_id;
        if (Auth::user()->skpd->id != $skpd_id) {
            toastr()->error('Jabatan ini tidak berada di SKPD ini');
            return back();
        } else {
            KinerjaIndikator::find($indikator_id)->delete();
            toastr()->success('Berhasil Dihapus');
            return back();
        }
    }
    public function editIndikator($id, $indikator_id)
    {
        $jabatan = Jabatan::find($id);
        $indikator = KinerjaIndikator::find($indikator_id);
        return view('admin.kinerjatriwulan.indikator.edit', compact('jabatan', 'id', 'indikator', 'indikator_id'));
    }
    public function updateIndikator(Request $req, $id, $indikator_id)
    {
        $skpd_id = Jabatan::find($id)->skpd_id;
        if (Auth::user()->skpd->id != $skpd_id) {
            toastr()->error('Jabatan ini tidak berada di SKPD ini');
            return back();
        } else {
            $n = KinerjaIndikator::find($indikator_id);
            $n->indikator = $req->indikator;
            $n->satuan = $req->satuan;
            $n->target = $req->target;
            $n->tw1 = $req->tw1;
            $n->tw2 = $req->tw2;
            $n->tw3 = $req->tw3;
            $n->tw4 = $req->tw4;
            $n->realisasi = $req->realisasi;
            $n->capaian = $req->capaian;
            $n->save();

            toastr()->success('Berhasil Diupdate');
            return redirect('/admin_skpd/kinerjatriwulan/struktur/' . $id . '/kinerja/' . $n->kinerja_triwulan_id);
        }
    }
    public function addTahun($id)
    {
        $jabatan = Jabatan::find($id);
        return view('admin.kinerjatriwulan.tahun.add', compact('jabatan', 'id'));
    }

    public function storeTahun(Request $req, $id)
    {
        $skpd_id = Jabatan::find($id)->skpd_id;
        if (Auth::user()->skpd->id != $skpd_id) {
            toastr()->error('Jabatan ini tidak berada di SKPD ini');
            return back();
        } else {
            $check = KinerjaTriwulan::where('jabatan_id', $id)->where('tahun', $req->tahun)->where('triwulan', $req->triwulan)->first();
            if ($check == null) {
                $n = new KinerjaTriwulan;
                $n->jabatan_id = $id;
                $n->tahun = $req->tahun;
                $n->triwulan = $req->triwulan;
                $n->skpd_id = Auth::user()->skpd->id;
                $n->save();
                toastr()->success('Berhasil Disimpan');
                return redirect('/admin_skpd/kinerjatriwulan/struktur/' . $id);
            } else {
                toastr()->error('Tahun dan Triwulan Sudah Ada');
                return back();
            }
        }
    }
}
