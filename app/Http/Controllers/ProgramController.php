<?php

namespace App\Http\Controllers;

use App\Pk;
use App\Iku2;
use App\Iku3;
use App\Tahun;
use App\Program;
use App\IndikatorIku3;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
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
        $data     = Program::where('jabatan_id', $this->jabatan->id)->paginate(10);
        
        $tahun_id = null;
        $tahun    = Tahun::with('periode')->get()->sortBy('tahun');
        return view('pegawai.program.index',compact('data','tahun','tahun_id'));
    }

    public function add()
    {
        $indikator_kinerja_utama = Iku3::where('jabatan_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->get()
        ->map(function($item){
            return $item->indikator3;
        })->collapse();
        
        return view('pegawai.program.add',compact('indikator_kinerja_utama'));
    }

    public function edit($id)
    {
        $indikator_kinerja_utama = Iku3::where('jabatan_id', $this->jabatan->id)->where('periode_id', periodeAktif()->id)->get()
        ->map(function($item){
            return $item->indikator3;
        })->collapse();
        $data = Program::find($id);

        return view('pegawai.program.edit',compact('data','indikator_kinerja_utama'));
    }

    public function store(Request $req) 
    {
        $attr                     = $req->all();
        $attr['indikator_iku3_id']= $req->indikator_iku_id;
        $attr['tahun_id']         = IndikatorIku3::find($req->indikator_iku_id)->tahun->id;
        $attr['jabatan_id']       = $this->jabatan->id;
        $attr['periode_id']       = Tahun::find($attr['tahun_id'])->periode->id;
        
        Program::create($attr);
        toastr()->success('Program Disimpan');
        return redirect('/pegawai/program');        
    } 
    
    public function update(Request $req, $id) 
    {
        $data = Program::find($id);
        $attr                     = $req->all();
        $attr['indikator_iku3_id']= $req->indikator_iku_id;
        $attr['tahun_id']         = IndikatorIku3::find($req->indikator_iku_id)->tahun->id;
        $attr['jabatan_id']       = $this->jabatan->id;
        $attr['periode_id']       = Tahun::find($attr['tahun_id'])->periode->id;
        
        $data->update($attr);
        toastr()->success('Program Diupdate');
        return redirect('/pegawai/program');        
    } 

    public function delete($id)
    {
        Program::find($id)->delete();
        toastr()->success('Program Dihapus');
        return back();
    }
    public function tampilkan()
    {
        $tahun_id    = request()->get('tahun_id');
        $button      = request()->get('button');
        $jabatan_id  = $this->jabatan->id;
        $tahun       = Tahun::with('periode')->get()->sortBy('tahun');
        
        if($button == 1 ){
            if(is_null($tahun_id)){
                return redirect('/pegawai/program');

            }else{
                $data = Program::where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan_id)->paginate(10);
                toastr()->success('Program Ditampilkan');
                request()->flash();
                return view('pegawai.program.index', compact('data','tahun_id', 'tahun'));
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
                $iku     = Iku2::where('tahun_id', $tahun_id)->where('jabatan_id', $jabatan->id)->get();
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
                                        if(count($item4->program) == 0){
                                            $data = [
                                                'id' => null,
                                                'nama' => null,
                                                'tw1' => null,
                                                'tw2' => null,
                                                'tw3' => null,
                                                'tw4' => null,
                                            ];
                                            $item4['program'][0] = $data;
                                        }else{
                                            $item4['program'] = $item4->program;
                                        }
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
                //dd($ra);
                
                $tahun   = Tahun::find($tahun_id);
                
                $pdf = PDF::loadView('pegawai.pdf.ra', compact('jabatan','ra','tahun'))->setPaper('legal','landscape');
                return $pdf->stream();
            }
        }

    }
}
