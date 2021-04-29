<?php

namespace App\Http\Controllers;

use App\Pk;
use App\Iku;
use App\Pk_indikator;
use Illuminate\Http\Request;
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
        $indikator_iku_id = Iku::where('jabatan_id', $this->jabatan->id)->get()->map(function($item, $key){
            return $item->indikator;
        })->collapse()->pluck('id');
        
        $data = Pk::whereIn('indikator_iku_id', $indikator_iku_id)->Paginate(10);
        
        return view('pegawai.pk.index', compact('data'));
    }

    public function tahun($tahun)
    {
        $indikator_iku_id = Iku::where('jabatan_id', $this->jabatan->id)->get()->map(function($item, $key){
            return $item->indikator;
        })->collapse()->pluck('id');
        
        $data = Pk::whereIn('indikator_iku_id', $indikator_iku_id)->where('tahun_id', $tahun)->Paginate(10);
        
        return view('pegawai.pk.index', compact('data'));
    }

    public function add()
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
                    toastr()->error('PK Pada Tahun Dan Jabatan Sudah Ada');
                }else{
                    $attr['tahun_id'] = $tahun->id;
                    $attr['indikator_iku_id'] = $indikator_iku->id;
                    $attr['jabatan_id'] = $this->jabatan->id;
                    Pk::create($attr);
                    toastr()->success('PK Berhasil Dibuat');
                }
            }
            
        }
        return back();
    }

    public function add_target($id)
    {
        $data = Pk::find($id);
        return view('pegawai.pk.target',compact('data'));
    }
    
    public function edit_target($id)
    {
        $data = Pk::find($id);
        return view('pegawai.pk.edit_target',compact('data'));
    }
    
    public function store_target(Request $req, $id)
    {
        $data = Pk::find($id);
        $data->target = $req->target;
        $data->save();

        toastr()->success('Target PK Berhasil Disimpan');
        
        return redirect('/pegawai/pk');
    }
    
    public function update_target(Request $req, $id)
    {
        $data = Pk::find($id);
        $data->target = $req->target;
        $data->save();

        toastr()->success('Target PK Berhasil Diupdate');
        
        return redirect('/pegawai/pk');
    }
    // public function edit($id)
    // {
    //     $jabatan = $this->jabatan;
    //     $data = Pk::find($id);
    //     return view('pegawai.pk.edit', compact('jabatan', 'data'));
    // }

    // public function editIndikator($id)
    // {
    //     $jabatan = $this->jabatan;
    //     $data = Pk_indikator::find($id);
        
    //     return view('pegawai.pk.edit_indikator', compact('jabatan', 'data'));
    // }
    // public function store(Request $req)
    // {
    //     Pk::create($req->all());
    //     toastr()->success('PK Berhasil Disimpan');
    //     return redirect('/pegawai/pk');
    // }

    // public function updateIndikator(Request $req, $id)
    // {
    //     Pk_indikator::find($id)->update($req->all());
    //     toastr()->success('Indikator & Target Berhasil Diupdate');
    //     return redirect('/pegawai/pk');
    // }

    // public function update(Request $req, $id)
    // {
    //     Pk::find($id)->update($req->all());
    //     toastr()->success('PK Berhasil Diupdate');
    //     return redirect('/pegawai/pk');
    // }
    // public function indikator($id)
    // {
    //     $data = Pk::find($id);
    //     return view('pegawai.pk.add_indikator', compact('data'));
    // }

    // public function storeIndikator(Request $req, $id)
    // {
    //     $attr = $req->all();
    //     $attr['pk_id'] = $id;
    //     Pk_indikator::create($attr);
    //     toastr()->success('Indikator Kinerja Berhasil Disimpan');
    //     return redirect('/pegawai/pk');
    // }

    // public function delete($id)
    // {
    //     try {
    //         Pk::find($id)->delete();
    //         toastr()->success('PK Berhasil Di hapus');
    //         return redirect('/pegawai/pk');
    //     } catch (\Exception $e) {
    //         toastr()->error('Tidak Bisa Di Hapus, Hapus terlebih Dahulu Indikator Dan Target PK');
    //         return back();
    //     }
    // }

    // public function deleteIndikator($id)
    // {
    //     Pk_indikator::find($id)->delete();
    //     toastr()->success('indikator Berhasil Di hapus');
    //     return redirect('/pegawai/pk');
    // }
}
