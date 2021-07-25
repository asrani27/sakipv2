<?php

namespace App\Http\Controllers;

use App\Iku2;
use App\Iku3;
use App\Iku4;
use App\Tahun;
use App\Pegawai;
use App\IndikatorIku2;
use App\IndikatorIku3;
use App\IndikatorIku4;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PkPegawaiController extends Controller
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
    
    public function pkpegawai($pegawai_id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = Iku2::with('indikator2')->where('jabatan_id', $this->jabatan($pegawai_id)->id)->paginate(10);
         
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = Iku3::with('indikator3')->where('jabatan_id', $this->jabatan($pegawai_id)->id)->paginate(10);

        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = Iku4::with('indikator4')->where('jabatan_id', $this->jabatan($pegawai_id)->id)->paginate(10);

        }
        $tahun_id = null;
        $tahun = Tahun::with('periode')->get()->sortBy('tahun');
        $pegawai = $this->pegawai($pegawai_id);
        return view('skpd.pkpegawai.index', compact('data','tahun','tahun_id','pegawai'));
    }

    public function tampilkan($pegawai_id)
    {
        $tahun_id    = request()->get('tahun_id');
        $button      = request()->get('button');
        $jabatan_id  = $this->jabatan($pegawai_id)->id;
        $tahun       = Tahun::with('periode')->get()->sortBy('tahun');
        $pegawai = $this->pegawai($pegawai_id);
        //dd($tahun_id, $button, $jabatan_id, $tahun);
        if($button == 1 ){
            if(is_null($tahun_id)){
                toastr()->info('Pilih Tahun');
                return redirect('/admin_skpd/pegawai/pk/'. $pegawai_id);
            }else{
                if($this->jabatan($pegawai_id)->tingkat == 1){
                    $data = Iku2::with('indikator2')->where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
                }elseif($this->jabatan($pegawai_id)->tingkat == 2){
                    $data = Iku3::with('indikator3')->where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
                }elseif($this->jabatan($pegawai_id)->tingkat == 3){
                    $data = Iku4::with('indikator4')->where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
                }
                toastr()->success('PK Ditampilkan');
                request()->flash();
                return view('skpd.pkpegawai.index', compact('data','tahun_id', 'tahun','pegawai'));
            }
            
        }else{
            if(is_null($tahun_id)){
                toastr()->info('Pilih Tahun');
                return back();
            }else{
                
                $jabatan = $this->jabatan($pegawai_id);
                $tahun   = Tahun::find($tahun_id);
                if($this->jabatan($pegawai_id)->tingkat == 1){
                    $pk      = Iku2::with('indikator2')->where('tahun_id', $tahun_id)->where('jabatan_id', $this->jabatan($pegawai_id)->id)->get();
                    $pdf = PDF::loadView('skpd.pdf.pk2', compact('jabatan','pk','tahun','pegawai'))->setPaper('letter');
                }elseif($this->jabatan($pegawai_id)->tingkat == 2){
                    $pk      = Iku3::with('indikator3')->where('tahun_id', $tahun_id)->where('jabatan_id', $this->jabatan($pegawai_id)->id)->get();
                    $pdf = PDF::loadView('skpd.pdf.pk3', compact('jabatan','pk','tahun','pegawai'))->setPaper('letter');
                }elseif($this->jabatan($pegawai_id)->tingkat == 3){
                    $pk      = Iku4::with('indikator4')->where('tahun_id', $tahun_id)->where('jabatan_id', $this->jabatan($pegawai_id)->id)->get();
                    $pdf = PDF::loadView('skpd.pdf.pk4', compact('jabatan','pk','tahun','pegawai'))->setPaper('letter');
                }
                
                return $pdf->stream();
            }
        }
    }

    public function add_target($pegawai_id, $id)
    { 
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        $pegawai = $this->pegawai($pegawai_id);
        return view('skpd.pkpegawai.target',compact('data','pegawai'));
    }
    public function edit_target($pegawai_id,$id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        $pegawai = $this->pegawai($pegawai_id);
        return view('skpd.pkpegawai.edit_target',compact('data','pegawai'));
    }
    public function store_target(Request $req, $pegawai_id, $id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        
        $data->target = $req->target;
        $data->save();

        toastr()->success('Target PK Berhasil Disimpan');
        $req->flash();

        return redirect('/admin_skpd/pegawai/pk/'.$pegawai_id.'/tampilkan?tahun_id='.$req->tahun_id.'&button=1');
    }
    public function update_target(Request $req,$pegawai_id,  $id)
    {
        if($this->jabatan($pegawai_id)->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan($pegawai_id)->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        
        $data->target = $req->target;
        $data->save();

        toastr()->success('Target PK Berhasil Diupdate');
        $req->flash();

        return redirect('/admin_skpd/pegawai/pk/'.$pegawai_id.'/tampilkan?tahun_id='.$req->tahun_id.'&button=1');
    }
}
