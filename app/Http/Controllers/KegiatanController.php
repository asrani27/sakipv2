<?php

namespace App\Http\Controllers;

use App\Iku4;
use App\Tahun;
use App\Program;
use App\Kegiatan;
use App\IndikatorIku4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
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
        $data  = Kegiatan::where('jabatan_id', $this->jabatan->id)->paginate(10);
        return view('pegawai.kegiatan.index', compact('data','tahun'));
    }
    
    public function tahun()
    {
        return Tahun::with('periode')->get()->sortBy('tahun');
    }

    public function add()
    {
        $atasan_id = $this->jabatan->atasan->id;
        $program = Program::with('tahun')->where('jabatan_id', $atasan_id)->get();
        
        $indikator_kasi = Iku4::with('tahun')->where('jabatan_id', $this->jabatan->id)->get()->map(function($item){
            return $item->indikator4;
        })->collapse();
        
        return view('pegawai.kegiatan.add',compact('program','indikator_kasi'));
    }

    public function edit($id)
    {
        $atasan_id = $this->jabatan->atasan->id;
        $program = Program::with('tahun')->where('jabatan_id', $atasan_id)->get();
        
        $indikator_kasi = Iku4::with('tahun')->where('jabatan_id', $this->jabatan->id)->get()->map(function($item){
            return $item->indikator4;
        })->collapse();
        $data = Kegiatan::find($id);
        return view('pegawai.kegiatan.edit',compact('program','indikator_kasi','data'));
    }

    public function store(Request $req)
    {
        $attr                       = $req->all();
        $attr['indikator_iku4_id']  = $req->indikator_id;
        $attr['jabatan_id']         = $this->jabatan->id;
        $attr['tahun_id']           = IndikatorIku4::find($attr['indikator_iku4_id'])->tahun_id;
        $attr['nama']               = $req->kegiatan;
        $attr['program_id']         = IndikatorIku4::find($attr['indikator_iku4_id'])->iku4->program_id;
        
        Kegiatan::create($attr);
        toastr()->success('Kegiatan Disimpan');
        return redirect('/pegawai/kegiatan');
        
    }

    public function delete($id)
    {
        Kegiatan::find($id)->delete();
        toastr()->success('Kegiatan Dihapus');
        return back();
    }

}
