<?php

namespace App\Http\Controllers;

use App\Iku;
use App\Iku2;
use App\Iku3;
use App\Iku4;
use App\Tahun;
use App\Program;
use App\IndikatorIku;
use App\IndikatorIku2;
use App\IndikatorIku3;
use App\IndikatorIku4;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
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
        $tahun = $this->tahun();
        if($this->jabatan->tingkat == 1){
            $data = Iku2::with('indikator2','periode')->where('jabatan_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->paginate(10);
         
        }elseif($this->jabatan->tingkat == 2){
            $data = Iku3::with('indikator3','periode')->where('jabatan_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->paginate(10);

        }elseif($this->jabatan->tingkat == 3){
            $data = Iku4::with('indikator4','periode')->where('jabatan_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->paginate(10);

        }else{

        }
        return view('pegawai.iku.index', compact('data','tahun'));
    }

    public function tahun()
    {
        return Tahun::with('periode')->get()->sortBy('tahun');
    }

    public function add()
    {
        $jabatan = $this->jabatan;
        $tahun = $this->tahun();
        if($jabatan->tingkat == '2'){
            $jabatan_id = $jabatan->atasan->id;
            $indikator_iku_atasan = Iku2::with('indikator2')->where('jabatan_id', $jabatan_id)->where('periode_id', periodeAktif()->id)->get()
            ->map(function($item){
                return $item->indikator2;
            })->collapse();
            
            return view('pegawai.iku.add', compact('jabatan','indikator_iku_atasan','tahun'));
        }elseif($jabatan->tingkat == '3'){
            $jabatan_id = $jabatan->atasan->id;
            $indikator_iku_atasan = Program::where('jabatan_id', $jabatan_id)->get();
            
            return view('pegawai.iku.add', compact('jabatan','indikator_iku_atasan','tahun'));
        }
        elseif($jabatan->tingkat == '1'){
            
            return view('pegawai.iku.add', compact('jabatan','tahun'));
        }
    }

    public function store(Request $req)
    {
        $attr = $req->all();
        
        $attr['jabatan_id'] = $this->jabatan->id;
        $attr['periode_id'] = Tahun::find($req->tahun_id)->periode->id;
        $attr['tahun_id']   = $req->tahun_id;
        if($this->jabatan->tingkat == 1){
            Iku2::create($attr);
            toastr()->success('IKU Berhasil Disimpan');
        }elseif($this->jabatan->tingkat == 2){
            $attr['indikator_iku2_id'] = $req->indikator_iku_id;
            Iku3::create($attr);
            toastr()->success('IKU Berhasil Disimpan');
        }elseif($this->jabatan->tingkat == 3){
            $attr['program_id'] = $req->indikator_iku_id;
            Iku4::create($attr);
            toastr()->success('IKU Berhasil Disimpan');
        }else{

        }
        return redirect('/pegawai/iku');
    }

    public function update(Request $req, $id)
    {
        if($this->jabatan->tingkat == 1){
            Iku2::find($id)->update($req->all());
        }elseif($this->jabatan->tingkat == 2){
            Iku3::find($id)->update($req->all());
        }elseif($this->jabatan->tingkat == 3){
            Iku4::find($id)->update($req->all());
        }
        toastr()->success('IKU Berhasil Diupdate');
        return redirect('/pegawai/iku');
    }

    public function edit($id)
    {
        $jabatan = $this->jabatan;
        $tahun = $this->tahun();
        if($this->jabatan->tingkat == 1){
            $data = Iku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $data = Iku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $data = Iku4::find($id);
        }
        return view('pegawai.iku.edit', compact('jabatan', 'data','tahun'));
    }
    
    public function edit_indikator($id)
    {
        if($this->jabatan->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        return view('pegawai.iku.edit_indikator', compact('data'));
    }
    
    public function update_indikator(Request $req, $id)
    {
        if($this->jabatan->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        $data->indikator        = $req->indikator_kinerja_utama;
        $data->sumber_data      = $req->sumber_data;
        $data->penjelasan       = $req->penjelasan;
        $data->penanggung_jawab = $req->penanggung_jawab;
        $data->save();
        toastr()->success('IKU Indikator Diupdate');

        return redirect('/pegawai/iku');
    }

    public function delete($id)
    {
        if($this->jabatan->tingkat == 1){
            Iku2::find($id)->delete();
        }elseif($this->jabatan->tingkat == 2){
            Iku3::find($id)->delete();
        }elseif($this->jabatan->tingkat == 3){
            Iku4::find($id)->delete();
        }
        toastr()->success('IKU Berhasil DiHapus');
        return back();
    }

    public function verifIKU($id)
    {   
        if($this->jabatan->tingkat == 1){
            $u = Iku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $u = Iku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $u = Iku4::find($id);
        }
        
        $u->verifikasi = 1;
        $u->save();
        toastr()->success('IKU Disetujui');
        return back(); 
    }

    public function add_indikator($id)
    {
        if($this->jabatan->tingkat == 1){
            $data = Iku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $data = Iku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $data = Iku4::find($id);
        }
        return view('pegawai.iku.add_indikator',compact('data'));
    }

    public function store_indikator(Request $req, $id)
    {
        $attr['indikator']          = $req->indikator_kinerja_utama;
        $attr['penjelasan']         = $req->penjelasan;
        $attr['sumber_data']        = $req->sumber_data;
        $attr['penanggung_jawab']   = $req->penanggung_jawab;
        $attr['tahun_id']           = $req->tahun_id;
     
        if($this->jabatan->tingkat == 1){
            $attr['iku2_id']        = $id;   
            IndikatorIku2::create($attr);
        }elseif($this->jabatan->tingkat == 2){
            $attr['iku3_id']        = $id;   
            IndikatorIku3::create($attr);
        }elseif($this->jabatan->tingkat == 3){
            $attr['iku4_id']        = $id;
            
            IndikatorIku4::create($attr);
        }

        toastr()->success('Indikator Disimpan');

        return redirect('/pegawai/iku');
        
    }

    public function search()
    {
        $search = request()->get('search');
        $data = Iku2::where('jabatan_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->where('kinerja_utama', 'like', '%'.$search.'%')->paginate(10);
        return view('pegawai.iku.index', compact('data'));
    }

    public function hapus_indikator($id)
    {
        if($this->jabatan->tingkat == 1){
            IndikatorIku2::find($id)->delete();
        }elseif($this->jabatan->tingkat == 2){
            IndikatorIku3::find($id)->delete();
        }elseif($this->jabatan->tingkat == 3){
            IndikatorIku4::find($id)->delete();
        }
        toastr()->success('Indikator Dihapus');
        return back();
    }

    public function pdf(Request $req)
    {
        $jabatan = $this->jabatan;
        $fungsi  = $jabatan->fungsi;
        $tugas   = $jabatan->tugas;

        if($this->jabatan->tingkat == 1){
            $iku     = Iku2::where('jabatan_id',$jabatan->id)->where('tahun_id', $req->tahun_id)->get();
            $pdf     = PDF::loadView('pegawai.pdf.iku2', compact('jabatan','fungsi','tugas','iku'))->setPaper('legal','landscape');
        }elseif($this->jabatan->tingkat == 2){
            $iku     = Iku3::where('jabatan_id',$jabatan->id)->where('tahun_id', $req->tahun_id)->get();
            $pdf     = PDF::loadView('pegawai.pdf.iku3', compact('jabatan','fungsi','tugas','iku'))->setPaper('legal','landscape');
        }elseif($this->jabatan->tingkat == 3){
            $iku     = Iku4::where('jabatan_id',$jabatan->id)->where('tahun_id', $req->tahun_id)->get();
            $pdf     = PDF::loadView('pegawai.pdf.iku4', compact('jabatan','fungsi','tugas','iku'))->setPaper('legal','landscape');
        }

        return $pdf->stream();
    }
}
