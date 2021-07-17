<?php

namespace App\Http\Controllers;

use App\Iku2;
use App\Iku3;
use App\Iku4;
use App\Tahun;
use App\Pegawai;
use App\Program;
use App\IndikatorIku2;
use App\IndikatorIku3;
use App\IndikatorIku4;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class IkuPegawaiController extends Controller
{
    public function pegawai($param)
    {
        $data = Pegawai::find($param);
        return $data;
    }

    public function jabatan($param)
    {
        $data = $this->pegawai($param)->jabatan;
        return $data;
    }
    
    public function tahun()
    {
        return Tahun::with('periode')->get()->sortBy('tahun');
    }
    
    public function ikupegawai($id)
    {
        $tahun = $this->tahun();
        if($this->jabatan($id)->tingkat == 1){
            $data = Iku2::with('indikator2','periode')->where('jabatan_id', $this->jabatan($id)->id)->where('periode_id', periodeAktif()->id)->paginate(10);
         
        }elseif($this->jabatan($id)->tingkat == 2){
            $data = Iku3::with('indikator3','periode')->where('jabatan_id', $this->jabatan($id)->id)->where('periode_id', periodeAktif()->id)->paginate(10);

        }elseif($this->jabatan($id)->tingkat == 3){
            $data = Iku4::with('indikator4','periode')->where('jabatan_id', $this->jabatan($id)->id)->where('periode_id', periodeAktif()->id)->paginate(10);

        }else{

        }

        $pegawai = $this->pegawai($id);
        return view('skpd.ikupegawai.index', compact('data','tahun','pegawai'));
    }

    public function addikupegawai($id)
    {
        $jabatan = $this->jabatan($id);
        $pegawai = $this->pegawai($id);
        $tahun = $this->tahun();
        if($jabatan->tingkat == '2'){
            $jabatan_id = $jabatan->atasan->id;
            $indikator_iku_atasan = Iku2::with('indikator2')->where('jabatan_id', $jabatan_id)->where('periode_id', periodeAktif()->id)->get()
            ->map(function($item){
                return $item->indikator2;
            })->collapse();
            
            return view('skpd.ikupegawai.add', compact('jabatan','indikator_iku_atasan','tahun','pegawai'));
        }elseif($jabatan->tingkat == '3'){
            $jabatan_id = $jabatan->atasan->id;
            $indikator_iku_atasan = Program::where('jabatan_id', $jabatan_id)->get();
            
            return view('skpd.ikupegawai.add', compact('jabatan','indikator_iku_atasan','tahun','pegawai'));
        }
        elseif($jabatan->tingkat == '1'){
            
            return view('skpd.ikupegawai.add', compact('jabatan','tahun','pegawai'));
        }
    }

    public function storeikupegawai(Request $req, $id)
    {
        $attr = $req->all();
        
        $attr['jabatan_id'] = $this->jabatan($id)->id;
        $attr['periode_id'] = Tahun::find($req->tahun_id)->periode->id;
        $attr['tahun_id']   = $req->tahun_id;
        if($this->jabatan($id)->tingkat == 1){
            Iku2::create($attr);
            toastr()->success('IKU Berhasil Disimpan');
        }elseif($this->jabatan($id)->tingkat == 2){
            $attr['indikator_iku2_id'] = $req->indikator_iku_id;
            Iku3::create($attr);
            toastr()->success('IKU Berhasil Disimpan');
        }elseif($this->jabatan($id)->tingkat == 3){
            $attr['program_id'] = $req->indikator_iku_id;
            Iku4::create($attr);
            toastr()->success('IKU Berhasil Disimpan');
        }else{

        }
        return redirect('/admin_skpd/pegawai/iku/'.$id);
    }

    public function editikupegawai($pegawai_id, $id)
    {
        $jabatan = $this->jabatan($pegawai_id);
        $tahun = $this->tahun();
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = Iku2::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = Iku3::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = Iku4::find($id);
        }
        return view('skpd.ikupegawai.edit', compact('jabatan', 'data','tahun','pegawai_id'));
    }

    public function updateikupegawai(Request $req, $pegawai_id, $id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            Iku2::find($id)->update($req->all());
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            Iku3::find($id)->update($req->all());
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            Iku4::find($id)->update($req->all());
        }
        toastr()->success('IKU Berhasil Diupdate');
        
        return redirect('/admin_skpd/pegawai/iku/'.$pegawai_id);
        
    }
    
    public function addIndikator($pegawai_id, $id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = Iku2::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = Iku3::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = Iku4::find($id);
        }
        return view('skpd.ikupegawai.add_indikator',compact('data','pegawai_id'));
    }
    
    public function storeIndikator(Request $req,$pegawai_id, $id)
    {
        $attr['indikator']          = $req->indikator_kinerja_utama;
        $attr['penjelasan']         = $req->penjelasan;
        $attr['sumber_data']        = $req->sumber_data;
        $attr['penanggung_jawab']   = $req->penanggung_jawab;
        $attr['tahun_id']           = $req->tahun_id;
     
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $attr['iku2_id']        = $id;   
            IndikatorIku2::create($attr);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $attr['iku3_id']        = $id;   
            IndikatorIku3::create($attr);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $attr['iku4_id']        = $id;
            
            IndikatorIku4::create($attr);
        }

        toastr()->success('Indikator Disimpan');

        return redirect('/admin_skpd/pegawai/iku/'.$pegawai_id);
        
    }

    public function deleteikupegawai($pegawai_id, $id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            Iku2::find($id)->delete();
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            Iku3::find($id)->delete();
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            Iku4::find($id)->delete();
        }
        toastr()->success('IKU Berhasil DiHapus');
        return back();
    }

    public function editIndikator($pegawai_id, $id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        
        return view('skpd.ikupegawai.edit_indikator', compact('data','pegawai_id'));
    }
    
    public function updateIndikator(Request $req, $pegawai_id, $id)
    {
        
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }

        $data->indikator        = $req->indikator_kinerja_utama;
        $data->sumber_data      = $req->sumber_data;
        $data->penjelasan       = $req->penjelasan;
        $data->penanggung_jawab = $req->penanggung_jawab;
        $data->save();
        toastr()->success('IKU Indikator Diupdate');

        return redirect('/admin_skpd/pegawai/iku/'.$pegawai_id);
        
    }
    
    public function hapusIndikator($pegawai_id, $id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            IndikatorIku2::find($id)->delete();
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            IndikatorIku3::find($id)->delete();
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            IndikatorIku4::find($id)->delete();
        }
        toastr()->success('Indikator Dihapus');
        return back();
    }
    
    public function printikupegawai(Request $req)
    {
        $jabatan = $this->jabatan($req->pegawai_id);
        $fungsi  = $jabatan->fungsi;
        $tugas   = $jabatan->tugas;

        if($this->jabatan($req->pegawai_id)->tingkat == 1){
            $iku     = Iku2::where('jabatan_id',$jabatan->id)->where('tahun_id', $req->tahun_id)->get();
            $pdf     = PDF::loadView('pegawai.pdf.iku2', compact('jabatan','fungsi','tugas','iku'))->setPaper('legal','landscape');
        }elseif($this->jabatan($req->pegawai_id)->tingkat == 2){
            $iku     = Iku3::where('jabatan_id',$jabatan->id)->where('tahun_id', $req->tahun_id)->get();
            $pdf     = PDF::loadView('pegawai.pdf.iku3', compact('jabatan','fungsi','tugas','iku'))->setPaper('legal','landscape');
        }elseif($this->jabatan($req->pegawai_id)->tingkat == 3){
            $iku     = Iku4::where('jabatan_id',$jabatan->id)->where('tahun_id', $req->tahun_id)->get();
            $pdf     = PDF::loadView('pegawai.pdf.iku4', compact('jabatan','fungsi','tugas','iku'))->setPaper('legal','landscape');
        }

        return $pdf->stream();
    }
}
