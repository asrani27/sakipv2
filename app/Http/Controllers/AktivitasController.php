<?php

namespace App\Http\Controllers;

use App\Iku2;
use App\Tahun;
use App\Kegiatan;
use App\Aktivitas;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktivitasController extends Controller
{
    protected $jabatan;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->jabatan = Auth::user()->pegawai->jabatan;
            return $next($request);
        });
    }

    public function tahun()
    {
        return Tahun::with('periode')->get()->sortBy('tahun');
    }
    
    public function index()
    {
        $tahun = $this->tahun();
        $data = Aktivitas::where('jabatan_id', $this->jabatan->id)->paginate(10);
        return view('pegawai.aktivitas.index',compact('data','tahun'));
    }
    
    public function add()
    {
        $kegiatan = Kegiatan::where('jabatan_id', $this->jabatan->id)->get();        
        return view('pegawai.aktivitas.add',compact('kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::where('jabatan_id', $this->jabatan->id)->get();    
        $data = Aktivitas::find($id);    
        return view('pegawai.aktivitas.edit',compact('kegiatan','data'));
    }

    public function store(Request $req)
    {
        $attr = $req->all();
        $attr['jabatan_id'] = $this->jabatan->id;
        $attr['tahun_id'] = Kegiatan::find($req->kegiatan_id)->tahun_id;
        
        Aktivitas::create($attr);
        toastr()->success('Aktivitas Disimpan');
        return redirect('/pegawai/aktivitas');
    }
    
    public function update(Request $req, $id)
    {
        $attr = $req->all();
        $attr['jabatan_id'] = $this->jabatan->id;
        $attr['tahun_id'] = Kegiatan::find($req->kegiatan_id)->tahun_id;
        
        Aktivitas::find($id)->update($attr);
        toastr()->success('Aktivitas Diupdate');
        return redirect('/pegawai/aktivitas');
    }

    public function tampilkan()
    {
        $tahun_id    = request()->get('tahun_id');
        $button      = request()->get('button');
        $jabatan_id  = $this->jabatan->id;
        $tahun       = Tahun::with('periode')->get()->sortBy('tahun');
        
        if($button == 1 ){
            if(is_null($tahun_id)){
                return redirect('/pegawai/aktivitas');

            }else{
                $data = Aktivitas::where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
                $tahun_edit   = Tahun::find($tahun_id);
                
                request()->flash();
                return view('pegawai.aktivitas.index', compact('data','tahun_id', 'tahun','tahun_edit'));
            }
            
        }else{
            if(is_null($tahun_id)){
                toastr()->info('Pilih Tahun');
                return back();
            }else{
                if($this->jabatan->tingkat == 2){
                    $jabatan = $this->jabatan->atasan;
                }elseif($this->jabatan->tingkat == 3){
                    $jabatan = $this->jabatan->atasan->atasan;
                }else{
                    $jabatan = $this->jabatan;
                }
                $iku     = Iku2::with('indikator2')->where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan->id)->get();
                $ra      = $iku->map(function($item){
                    if(count($item->indikator2) == 0){
                        $data = [
                                'id' => null,
                                'indikator' => null,
                                'tw1' => null,
                                'tw2' => null,
                                'tw3' => null,
                                'tw4' => null,
                                'iku3' => [
                                    [
                                        'id' => null,
                                        'kinerja_utama' => null,
                                        'indikator3' => [[
                                            'id' => null,
                                            'indikator' => null,
                                            'program' => [[
                                                'id' => null,
                                                'nama' => null,
                                                'tw1' => null,
                                                'tw2' => null,
                                                'tw3' => null,
                                                'tw4' => null,
                                            ]]
                                        ]]
                                    ]
                                ],
                        ];
                        $item['indikator2'][0] = $data;
                    }else{
                        $item->indikator2->map(function($item2){
                            if(count($item2->iku3) == 0){
                                $data = [
                                    'id' => null,
                                    'kinerja_utama' => null,
                                    'indikator3' => [[
                                        'id' => null,
                                        'indikator' => null,
                                        'program' => [[
                                            'id' => null,
                                            'nama' => null,
                                            'tw1' => null,
                                            'tw2' => null,
                                            'tw3' => null,
                                            'tw4' => null,
                                        ]]
                                    ]],
                                ];
                                $item2['iku3'][0] = $data;
                            }else{
                                $item2->iku3->map(function($item3){
                                    $item3->indikator3->map(function($item4){
                                        $item4->program->map(function($item5){
                                            if(count($item5->kegiatan) == 0){
                                                $data = [
                                                    'id' => null,
                                                    'nama_kegiatan' => null,
                                                ];
                                                $item5['kegiatan'][0] = $data;
                                            }else{
                                                return $item5;
                                            }
                                        });
                                        return $item4;
                                    });
                                    return $item3;
                                });
                            }
                            return $item2;
                        });
                    }
                    return $item;
                })->toArray();
                
                
                $tahun   = Tahun::find($tahun_id);
                
                $pdf = PDF::loadView('pegawai.pdf.ra', compact('jabatan','ra','tahun'))->setPaper('legal','landscape');
                return $pdf->stream();
            }
        }

    }
}
