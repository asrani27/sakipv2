<?php

namespace App\Http\Controllers;

use App\Iku;
use App\IndikatorIku;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IkuController extends Controller
{
    protected $jabatan;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->jabatan = Auth::user()->pegawai->jabatan;
            return $next($request);
        });
    }

    public function index()
    {
        $data = Iku::with('indikator')->where('jabatan_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->paginate(10);
        return view('pegawai.iku.index', compact('data'));
    }

    public function add()
    {
        $jabatan = $this->jabatan;
        if($jabatan->tingkat == '2' || $jabatan->tingkat == '3'){
            $jabatan_id = $jabatan->atasan->id;
            $indikator_iku_atasan = Iku::where('jabatan_id', $jabatan_id)->where('periode_id', periodeAktif()->id)->get()
            ->map(function($item){
                return $item->indikator;
            })->collapse();
            return view('pegawai.iku.add', compact('jabatan','indikator_iku_atasan'));
        }
        else{
            return view('pegawai.iku.add', compact('jabatan'));
        }
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
    
    public function edit_indikator($id)
    {
        $data = IndikatorIku::find($id);
        return view('pegawai.iku.edit_indikator', compact('data'));
    }
    
    public function update_indikator(Request $req, $id)
    {

        $data = IndikatorIku::find($id);
        $data->indikator        = $req->indikator;
        $data->sumber_data      = $req->sumber_data;
        $data->penanggung_jawab = $req->penanggung_jawab;
        $data->save();
        toastr()->success('IKU Indikator Diupdate');

        return redirect('/pegawai/iku');
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

    public function add_indikator($id)
    {
        $data = Iku::find($id);
        return view('pegawai.iku.add_indikator',compact('data'));
    }

    public function store_indikator(Request $req, $id)
    {
        $attr['iku_id']             = $id;
        $attr['indikator']          = $req->indikator_kinerja_utama;
        $attr['penjelasan']         = $req->penjelasan;
        $attr['sumber_data']        = $req->sumber_data;
        $attr['penanggung_jawab']   = $req->penanggung_jawab;
        
        IndikatorIku::create($attr);

        toastr()->success('Indikator Disimpan');

        return redirect('/pegawai/iku');
        
    }

    public function search()
    {
        $search = request()->get('search');
        $data = Iku::where('jabatan_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->where('kinerja_utama', 'like', '%'.$search.'%')->paginate(10);
        return view('pegawai.iku.index', compact('data'));
    }

    public function hapus_indikator($id)
    {
        IndikatorIku::find($id)->delete();
        toastr()->success('Indikator Dihapus');
        return back();
    }

    public function pdf(Request $req)
    {
        $jabatan = $this->jabatan;
        $fungsi  = $jabatan->fungsi;
        $tugas   = $jabatan->tugas;
        $iku     = Iku::where('jabatan_id',$jabatan->id)->where('periode_id', $req->periode_id)->get();
        
        $pdf = PDF::loadView('pegawai.pdf.iku', compact('jabatan','fungsi','tugas','iku'))->setPaper('legal','landscape');
        return $pdf->stream();
    }
}
