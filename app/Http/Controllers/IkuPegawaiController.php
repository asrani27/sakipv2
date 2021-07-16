<?php

namespace App\Http\Controllers;

use App\Iku2;
use App\Iku3;
use App\Iku4;
use App\Tahun;
use App\Pegawai;
use App\Program;
use Illuminate\Http\Request;

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
    
}
