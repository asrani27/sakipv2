<?php

namespace App\Http\Controllers;

use App\Pk;
use App\Iku;
use App\Tahun;
use App\Sasaran;
use App\RencanaAksi;
use App\Pk_indikator;
use App\IndikatorSasaran;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class RAController extends Controller
{
    public function index()
    {
        $data = 0;
            
        return view('pegawai.ra.index',compact('data'));
    }
    
    public function rencana_aksi_tingkat2($tahun_id, $user)
    {
        $unit_kerja_id_atasan = $user->atasan->id;
        $data = Pk::where('tahun_id', $tahun_id)->where('unit_kerja_id', $unit_kerja_id_atasan)->get();
        $periode_id = Tahun::find($tahun_id)->periode_id;

        $data = Iku::where('periode_id', $periode_id)->where('unit_kerja_id',$unit_kerja_id_atasan)->get()
        ->map(function($item)use($tahun_id){
            
            $eselon2['ikues2'] = $item->kinerja_utama;
            $eselon2['indikator_ikues2'] = $item->indikator->map(function($item2)use($tahun_id){
                $tws = $item2->target->where('tahun_id', $tahun_id)->first();
                $target['indikator_ikues2'] = $item2->indikator;
                $target['tw1_ikues2'] =  $tws == null ? null : $tws->tw1;
                $target['tw2_ikues2'] =  $tws == null ? null : $tws->tw2;
                $target['tw3_ikues2'] =  $tws == null ? null : $tws->tw3;
                $target['tw4_ikues2'] =  $tws == null ? null : $tws->tw4;
                if(count($item2->kinerjautamaeselon3) == 0){
                    $arr = [
                        [
                        'ikues3' => null,
                        'indikator_ikues3' => [
                                            [
                                    'indikator_ikues3' => null,
                                    'tw1_ikues3' => null,
                                    'tw2_ikues3' => null,
                                    'tw3_ikues3' => null,
                                    'tw4_ikues3' => null,
                                ]
                            ],
                            
                        'count_indikator_ikues3' => 1
                        ]
                    ];
                    $target['kinerjaEs3'] = $arr;
                }else{
                    $target['kinerjaEs3'] =  $item2->kinerjautamaeselon3->map(function($item3)use($tahun_id){
                        $eselon3['ikues3'] = $item3->kinerja_utama;
                        $eselon3['indikator_ikues3'] = $item3->indikator->map(function($item4)use($tahun_id){
                            $tws3 = $item4->target->where('tahun_id', $tahun_id)->first();
                            $target['id_indikator_ikues3'] = $tws3->id;
                            $target['indikator_ikues3'] = $item4->indikator;
                            $target['tw1_ikues3'] =  $tws3 == null ? null : $tws3->tw1;
                            $target['tw2_ikues3'] =  $tws3 == null ? null : $tws3->tw2;
                            $target['tw3_ikues3'] =  $tws3 == null ? null : $tws3->tw3;
                            $target['tw4_ikues3'] =  $tws3 == null ? null : $tws3->tw4;
                            return $target;
                        })->toArray();
                        $eselon3['count_indikator_ikues3'] =  count($eselon3['indikator_ikues3']);
                        return $eselon3;
                    })->toArray();
                }
                $target['count_indikator_ikues3'] =  Arr::pluck($target['kinerjaEs3'], 'count_indikator_ikues3');
                $target['rowspan_indikator_ikues2'] =  array_sum(Arr::pluck($target['kinerjaEs3'], 'count_indikator_ikues3'));
                return $target;
            })->toarray();
            $eselon2['rowspan_ikues2'] =  array_sum(Arr::collapse(Arr::pluck($eselon2['indikator_ikues2'], 'count_indikator_ikues3')));
            return $eselon2;
        })->toArray();
        return $data;
    }

    
    public function rencana_aksi_tingkat1($tahun_id, $unit_kerja_id)
    {
        $periode_id = Tahun::find($tahun_id)->periode_id;
        $data = Iku::where('periode_id', $periode_id)->where('unit_kerja_id',$unit_kerja_id)->get()
        ->map(function($item)use($tahun_id){
            
            $eselon2['ikues2'] = $item->kinerja_utama;
            $eselon2['indikator_ikues2'] = $item->indikator->map(function($item2)use($tahun_id){
                $tws = $item2->target->where('tahun_id', $tahun_id)->first();
                if($tws == null){
                    $target['id_indikator_ikues2'] = 0;
                }else{
                    $target['id_indikator_ikues2'] = $tws->id;
                }
                $target['indikator_ikues2'] = $item2->indikator;
                $target['tw1_ikues2'] =  $tws == null ? null : $tws->tw1;
                $target['tw2_ikues2'] =  $tws == null ? null : $tws->tw2;
                $target['tw3_ikues2'] =  $tws == null ? null : $tws->tw3;
                $target['tw4_ikues2'] =  $tws == null ? null : $tws->tw4;
                if(count($item2->kinerjautamaeselon3) == 0){
                    $arr = [
                        [
                        'ikues3' => null,
                        'indikator_ikues3' => [
                                            [
                                    'indikator_ikues3' => null,
                                    'tw1_ikues3' => null,
                                    'tw2_ikues3' => null,
                                    'tw3_ikues3' => null,
                                    'tw4_ikues3' => null,
                                ]
                            ],
                            
                        'count_indikator_ikues3' => 1
                        ]
                    ];
                    $target['kinerjaEs3'] = $arr;
                }else{
                    $target['kinerjaEs3'] =  $item2->kinerjautamaeselon3->map(function($item3)use($tahun_id){
                        $eselon3['ikues3'] = $item3->kinerja_utama;
                        $eselon3['indikator_ikues3'] = $item3->indikator->map(function($item4)use($tahun_id){
                            $tws3 = $item4->target->where('tahun_id', $tahun_id)->first();
                            $target['indikator_ikues3'] = $item4->indikator;
                            $target['tw1_ikues3'] =  $tws3 == null ? null : $tws3->tw1;
                            $target['tw2_ikues3'] =  $tws3 == null ? null : $tws3->tw2;
                            $target['tw3_ikues3'] =  $tws3 == null ? null : $tws3->tw3;
                            $target['tw4_ikues3'] =  $tws3 == null ? null : $tws3->tw4;
                            return $target;
                        })->toArray();
                        $eselon3['count_indikator_ikues3'] =  count($eselon3['indikator_ikues3']);
                        return $eselon3;
                    })->toArray();
                }
                $target['count_indikator_ikues3'] =  Arr::pluck($target['kinerjaEs3'], 'count_indikator_ikues3');
                $target['rowspan_indikator_ikues2'] =  array_sum(Arr::pluck($target['kinerjaEs3'], 'count_indikator_ikues3'));
                return $target;
            })->toarray();
            $eselon2['rowspan_ikues2'] =  array_sum(Arr::collapse(Arr::pluck($eselon2['indikator_ikues2'], 'count_indikator_ikues3')));
            return $eselon2;
        })->toArray();
        return $data;
    }

    public function tampilTahun($tahun_id)
    {
        $user = Auth::user()->pegawai->unitkerja;
        $unit_kerja_id = $user->id;
        $tingkat = $user->tingkat;
        $tahun = Tahun::find($tahun_id)->tahun;
        if($tingkat == '2'){
            
            $data = $this->rencana_aksi_tingkat2($tahun_id, $user);
           
            return view('pegawai.ra.index_2',compact('data','tahun','tahun_id'));
        }else{

            $data = $this->rencana_aksi_tingkat1($tahun_id, $unit_kerja_id);
                        //dd($data);
            return view('pegawai.ra.index',compact('data','tahun_id'));
        }
    }

    public function add_tw1($id)
    {
        $data = Pk::find($id);
        if($data == null){
            toastr()->error('Indikator Tidak Ada DI PK, Harap Masukkan Ke PK terlebih Dahulu');
            return back();
        }else{
            return view('pegawai.ra.add_tw1',compact('data','id'));
        }
    }
    
    public function add_tw2($id)
    {
        $data = Pk::find($id);
        if($data == null){
            toastr()->error('Indikator Tidak Ada DI PK, Harap Masukkan Ke PK terlebih Dahulu');
            return back();
        }else{
            return view('pegawai.ra.add_tw2',compact('data','id'));
        }
    }

    public function add_tw3($id)
    {
        $data = Pk::find($id);  
        if($data == null){
            toastr()->error('Indikator Tidak Ada DI PK, Harap Masukkan Ke PK terlebih Dahulu');
            return back();
        }else{
            return view('pegawai.ra.add_tw3',compact('data','id'));
        }
    }

    public function add_tw4($id)
    {
        $data = Pk::find($id);
        if($data == null){
            toastr()->error('Indikator Tidak Ada DI PK, Harap Masukkan Ke PK terlebih Dahulu');
            return back();
        }else{
            return view('pegawai.ra.add_tw4',compact('data','id'));
        }
    }

    public function store_tw1(Request $req, $id)
    {
        $data = Pk::find($id);
        $data->tw1 = $req->target;
        $data->save();
        
        toastr()->success('TW I Berhasil Disimpan');
        return redirect('/pegawai/rencana-aksi/'.$data->tahun_id);
    }
    
    public function store_tw2(Request $req, $id)
    {
        $data = Pk::find($id);
        $data->tw2 = $req->target;
        $data->save();
        
        toastr()->success('TW II Berhasil Disimpan');
        return redirect('/pegawai/rencana-aksi/'.$data->tahun_id);
    }

    public function store_tw3(Request $req, $id)
    {
        $data = Pk::find($id);
        $data->tw3 = $req->target;
        $data->save();
        
        toastr()->success('TW III Berhasil Disimpan');
        return redirect('/pegawai/rencana-aksi/'.$data->tahun_id);
    }

    public function store_tw4(Request $req, $id)
    {
        $data = Pk::find($id);
        $data->tw4 = $req->target;
        $data->save();
        
        toastr()->success('TW IV Berhasil Disimpan');
        return redirect('/pegawai/rencana-aksi/'.$data->tahun_id);
    }

    public function export_pdf($tahun)
    {
        $customPaper = array(0,0,360,360);
	    $pdf = PDF::loadview('pegawai.ra.pdf',compact('data'));
        $pdf->setPaper('11x17', 'landscape');
        return $pdf->stream('test_pdf.pdf');;
    }

}
