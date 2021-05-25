<?php

namespace App\Http\Controllers;

use App\Pk;
use App\API;
use App\Iku;
use App\Iku2;
use App\Iku3;
use App\Iku4;
use App\Skpd;
use App\User;
use App\Tahun;
use App\Jabatan;
use App\Periode;
use App\UnitKerja;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected $kodePemda = '6371';

    public function index()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('login');
    }

    public function rpjmd()
    {
        $data = null;
        return view('rpjmd', compact('data'));
    }

    public function pohonKinerja()
    {
        $data = null;
        return view('pohonkinerja', compact('data'));
    }

    public function iku()
    {
        $data = null;
        return view('iku', compact('data'));
    }

    public function perjanjianKinerja()
    {
        $data = null;
        return view('perjanjiankinerja', compact('data'));
    }

    public function kinerjaTriwulan()
    {
        $data = 'as';
        return view('kinerjatriwulan', compact('data'));
    }

    public function kinerjaTahunan()
    {
        $data = null;
        return view('kinerjatahunan', compact('data'));
    }

    public function searchKinerjaTriwulan()
    {
        toastr()->info('Data Tidak Ditemukan');
        return back();
    }

    public function searchRpjmd()
    {
        $periode = request()->get('periode');
        if (API::where('periode', $periode)->first() == null) {
            toastr()->error('Data Tidak Ditemukan');
            return back();
        } else {
            $jsonData = json_decode(API::where('periode', $periode)->first()->isi, true);

            $data = collect($jsonData)->map(function ($item) {
                $data = array();
                if (is_array($item)) {
                    return collect($item)->map(function ($item2) {
                        $item2['tujuan'] = collect($item2['tujuan'])->map(function ($item3) {
                            $item3['sasaranRows'] = collect($item3['sasaran'])->map(function ($item4) {
                                return count($item4['indikator']);
                            })->sum();
                            return $item3;
                        });
                        $item2['tujuanRows'] = count($item2['tujuan']);
                        return $item2;
                    });
                } else {
                }
                return $item;
            });

            return view('rpjmd', compact('data', 'periode'));
        }
    }

    public function searchIku()
    {
        $periode = Periode::find(request()->get('periode_id'));
        $jabatan = Jabatan::find(request()->get('jabatan_id'));
        if($jabatan->tingkat == 1){
            $data = Iku2::where('periode_id', request()->get('periode_id'))->where('jabatan_id', request()->get('jabatan_id'))->get();

        }elseif($jabatan->tingkat == 2){
            $data = Iku3::where('periode_id', request()->get('periode_id'))->where('jabatan_id', request()->get('jabatan_id'))->get();

        }elseif($jabatan->tingkat == 3){
            $data = Iku4::where('periode_id', request()->get('periode_id'))->where('jabatan_id', request()->get('jabatan_id'))->get();

        }
        return view('iku', compact('data', 'periode', 'jabatan'));
    }

    public function searchPk()
    {
        $tahun   = Tahun::find(request()->get('tahun_id'));
        $jabatan = Jabatan::find(request()->get('jabatan_id'));
        
        if($jabatan->tingkat == 1){
            $data      = Iku2::with('indikator2')->where('tahun_id', $tahun->id)->where('jabatan_id', $jabatan->id)->get();
        }elseif($jabatan->tingkat == 2){
            $data      = Iku3::with('indikator3')->where('tahun_id', $tahun->id)->where('jabatan_id', $jabatan->id)->get();
        }elseif($jabatan->tingkat == 3){
            $data      = Iku4::with('indikator4')->where('tahun_id', $tahun->id)->where('jabatan_id', $jabatan->id)->get();
        }
        // $iku     = Iku::with('pk')->where('jabatan_id', $jabatan->id)->get();
        // $data      = $iku->map(function($item)use($tahun){
        //     $item->indikator_kinerja_utama = $item->pk->where('tahun_id', $tahun->id);
        //     return $item;
        // });
        
        //$data = Pk::where('tahun_id', request()->get('tahun_id'))->where('jabatan_id', request()->get('jabatan_id'))->get();
        
        return view('perjanjiankinerja', compact('data', 'tahun', 'jabatan'));
    }

    public function pohonSearch()
    {
        $data = Skpd::find(request()->get('skpd_id'));
        return view('pohonkinerja', compact('data'));
    }
    public function cekUsername($param)
    {
        $cekUser = User::where('username', $param)->first();
        if ($cekUser == null) {
            $data = 0;
        } else {
            $data = 1;
        }
        return response()->json($data);
    }

    public function ikuGetJab($id)
    {
        $data = jabatan::where('skpd_id', $id)->get();
        return json_encode($data);
    }
}
