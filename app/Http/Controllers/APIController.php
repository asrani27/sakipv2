<?php

namespace App\Http\Controllers;

use App\API;
use App\Skpd;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function rpjmd()
    {
        $data = API::where('jenis', 'rpjmd')->get();
        $resp = [];
        return view('admin.api.rpjmd.index', compact('data', 'resp'));
    }

    public function rkpd()
    {
        $data = API::where('jenis', 'rkpd')->get();
        $resp = [];
        return view('admin.api.rkpd.index', compact('data', 'resp'));
    }

    public function getRpjmd(Request $req)
    {
        try {
            $data = API::where('jenis', 'rpjmd')->get();
            $resp = get_rpjmd($req->periode_id);
            $periode = $req->periode_id;
            //dd(count($resp), $periode, $data);
            return view('admin.api.rpjmd.index', compact('data', 'resp', 'periode'));
        } catch (\Exception $e) {
            toastr()->error('SIPD Sedang OFFLINE');
            return back();
        }
    }

    public function getRkpd(Request $req)
    {
        try {
            $data = API::where('jenis', 'rkpd')->get();
            $skpd = Skpd::get();
            $resp = $skpd->map(function ($item, $key) use ($req) {
                $item['data_API'] = api($req->tahun, $item->kode_skpd);
                return $item;
            });
            $tahun = $req->tahun;
            $req->flash();
            return view('admin.api.rkpd.index', compact('data', 'resp', 'tahun'));
        } catch (\Exception $e) {
            toastr()->error('SIPD Sedang OFFLINE');
            return back();
        }
    }

    public function tampilRpjmd($periode)
    {
        return get_rpjmd($periode);
    }

    public function tampilRkpd($tahun, $kode_skpd)
    {
        return api($tahun, $kode_skpd);
    }

    public function simpanRpjmd($periode)
    {
        $check = API::where('periode', $periode)->first();
        if ($check != null) {
            toastr()->info('Data RPJMD Sudah Ada');
        } else {
            $attr['periode'] = $periode;
            $attr['jenis'] = 'rpjmd';
            $attr['isi'] = json_encode(get_rpjmd($periode), true);
            API::create($attr);
            toastr()->success('Data RPJMD Berhasil Disimpan');
        }
        return redirect('/sipd/rpjmd');
    }
    public function simpanRkpd($tahun)
    {
        try {
            $skpd = Skpd::get();
            $resp = $skpd->map(function ($item, $key) use ($tahun) {
                $attr['tahun'] = $tahun;
                $attr['jenis'] = 'rkpd';
                $attr['kode_skpd'] = $item->kode_skpd;
                $attr['isi'] = json_encode(api($tahun, $item->kode_skpd), true);
                $check = API::where('tahun', $tahun)->where('kode_skpd', $item->kode_skpd)->first();
                if ($check == null) {
                    API::create($attr);
                    toastr()->success('Data RKPD ' . $item->nama . ' Berhasil Disimpan');
                } else {
                    $check->update($attr);
                    toastr()->success('Data RKPD  ' . $item->nama . ' Berhasil DiUpdate');
                }
            });
            return redirect('/sipd/rkpd');
        } catch (\Exception $e) {
            toastr()->error('Something Wrong');
            return back();
        }
    }

    public function DB_rpjmd($periode)
    {
        $data = API::where('periode', $periode)->first();
        return json_decode($data->isi, TRUE);
    }

    public function DB_rkpd($tahun, $kode_skpd)
    {
        $data = API::where('tahun', $tahun)->where('kode_skpd', $kode_skpd)->first();
        return json_decode($data->isi, TRUE);
    }

    public function deleteRpjmd($id)
    {
        API::find($id)->delete();
        toastr()->success('Data RPJMD Berhasil Dihapus');
        return back();
    }
}
