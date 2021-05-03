<?php

namespace App\Http\Controllers;

use App\Pk;
use App\Iku;
use App\Iku2;
use App\Iku3;
use App\Iku4;
use App\Tahun;
use App\Pk_indikator;
use App\IndikatorIku2;
use App\IndikatorIku3;
use App\IndikatorIku4;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PkController extends Controller
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
        if($this->jabatan->tingkat == 1){
            $data = Iku2::with('indikator2')->where('jabatan_id', $this->jabatan->id)->paginate(10);
         
        }elseif($this->jabatan->tingkat == 2){
            $data = Iku3::with('indikator3')->where('jabatan_id', $this->jabatan->id)->paginate(10);

        }elseif($this->jabatan->tingkat == 3){
            $data = Iku4::with('indikator4')->where('jabatan_id', $this->jabatan->id)->paginate(10);

        }
        $tahun_id = null;
        $tahun = Tahun::with('periode')->get()->sortBy('tahun');
        return view('pegawai.pk.index', compact('data','tahun','tahun_id'));
    }

    public function tampilkan()
    {
        $tahun_id    = request()->get('tahun_id');
        $button      = request()->get('button');
        $jabatan_id  = $this->jabatan->id;
        $tahun       = Tahun::with('periode')->get()->sortBy('tahun');
        
        if($button == 1 ){
            if(is_null($tahun_id)){
                return redirect('/pegawai/pk');

            }else{
                if($this->jabatan->tingkat == 1){
                    $data = Iku2::with('indikator2')->where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
                }elseif($this->jabatan->tingkat == 2){
                    $data = Iku3::with('indikator3')->where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
                }elseif($this->jabatan->tingkat == 3){
                    $data = Iku4::with('indikator4')->where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
                }
                toastr()->success('PK Ditampilkan');
                request()->flash();
                return view('pegawai.pk.index', compact('data','tahun_id', 'tahun'));
            }
            
        }else{
            if(is_null($tahun_id)){
                toastr()->info('Pilih Tahun');
                return back();
            }else{
                
                $jabatan = $this->jabatan;
                $tahun   = Tahun::find($tahun_id);
                if($this->jabatan->tingkat == 1){
                    $pk      = Iku2::with('indikator2')->where('tahun_id', $tahun_id)->where('jabatan_id', $this->jabatan->id)->get();
                    $pdf = PDF::loadView('pegawai.pdf.pk2', compact('jabatan','pk','tahun'))->setPaper('letter');
                }elseif($this->jabatan->tingkat == 2){
                    $pk      = Iku3::with('indikator3')->where('tahun_id', $tahun_id)->where('jabatan_id', $this->jabatan->id)->get();
                    $pdf = PDF::loadView('pegawai.pdf.pk3', compact('jabatan','pk','tahun'))->setPaper('letter');
                }elseif($this->jabatan->tingkat == 3){
                    $pk      = Iku4::with('indikator4')->where('tahun_id', $tahun_id)->where('jabatan_id', $this->jabatan->id)->get();
                    $pdf = PDF::loadView('pegawai.pdf.pk4', compact('jabatan','pk','tahun'))->setPaper('letter');
                }
                
                return $pdf->stream();
            }
        }

    }

    public function tahun($tahun_id)
    {
        
        $tahun       = Tahun::with('periode')->get()->sortBy('tahun');
        $jabatan_id  = $this->jabatan->id;
        
        $data = Pk::where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
        request()->flash();
        return view('pegawai.pk.index', compact('data','tahun','tahun_id'));
    }

    public function add()
    {
        $periode = periodeAktif();
        $data_iku = Iku2::where('jabatan_id', $this->jabatan->id)->get()->map(function($item, $key){
            return $item->indikator;
        })->collapse(); 
        
        foreach($periode->tahun as $tahun)
        {
            foreach($data_iku as $indikator_iku)
            {
                //Create PK all Periode
                $check = Pk::where('tahun_id',$tahun->id)->where('indikator_iku_id',$indikator_iku->id)->first();
                if($check != null){
                    toastr()->error('PK Pada Tahun Dan Jabatan Sudah Ada');
                }else{
                    $attr['tahun_id'] = $tahun->id;
                    $attr['iku_id'] = $indikator_iku->iku->id;
                    $attr['indikator_iku_id'] = $indikator_iku->id;
                    $attr['jabatan_id'] = $this->jabatan->id;
                    
                    Pk::create($attr);
                    toastr()->success('PK Berhasil Dibuat');
                }
            }
        }
        return back();
    }

    public function update()
    {
        $periode = periodeAktif();
        $data_iku = Iku::where('jabatan_id', $this->jabatan->id)->get()->map(function($item, $key){
            return $item->indikator;
        })->collapse(); 
        foreach($periode->tahun as $tahun)
        {
            foreach($data_iku as $indikator_iku)
            {
                //Create PK all Periode
                $check = Pk::where('tahun_id',$tahun->id)->where('indikator_iku_id',$indikator_iku->id)->first();
                if($check != null){
                    toastr()->success('PK Di Perbaharui');
                }else{
                    
                    $attr['tahun_id'] = $tahun->id;
                    $attr['iku_id'] = $indikator_iku->iku->id;
                    $attr['indikator_iku_id'] = $indikator_iku->id;
                    $attr['jabatan_id'] = $this->jabatan->id;
                    Pk::create($attr);
                }
            }
        }
        toastr()->success('PK Berhasil Di perbaharui');
        return back();
    }

    public function add_target($id)
    { 
        if($this->jabatan->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        return view('pegawai.pk.target',compact('data'));
    }
    
    public function edit_target($id)
    {
        if($this->jabatan->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        return view('pegawai.pk.edit_target',compact('data'));
    }
    
    public function store_target(Request $req, $id)
    {
        if($this->jabatan->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        
        $data->target = $req->target;
        $data->save();

        toastr()->success('Target PK Berhasil Disimpan');
        $req->flash();

        return redirect('/pegawai/pk/tampilkan?tahun_id='.$req->tahun_id.'&button=1');
    }
    
    public function update_target(Request $req, $id)
    {
        if($this->jabatan->tingkat == 1){
            $data = IndikatorIku2::find($id);
        }elseif($this->jabatan->tingkat == 2){
            $data = IndikatorIku3::find($id);
        }elseif($this->jabatan->tingkat == 3){
            $data = IndikatorIku4::find($id);
        }
        
        $data->target = $req->target;
        $data->save();

        toastr()->success('Target PK Berhasil Diupdate');
        $req->flash();

        return redirect('/pegawai/pk/tampilkan?tahun_id='.$req->tahun_id.'&button=1');
    }
    
}
