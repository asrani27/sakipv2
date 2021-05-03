<?php

namespace App\Http\Controllers;

use App\Pk;
use App\Tahun;
use App\Program;
use Illuminate\Http\Request;
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
        $indikator_kinerja_utama = Pk::where('jabatan_id', $this->jabatan->id)->get();
        return view('pegawai.program.add',compact('indikator_kinerja_utama'));
    }

    public function edit($id)
    {
        $indikator_kinerja_utama = Pk::where('jabatan_id', $this->jabatan->id)->get();
        $data = Program::find($id);

        return view('pegawai.program.edit',compact('data','indikator_kinerja_utama'));
    }

    public function store(Request $req) 
    {
        $attr                     = $req->all();
        $attr['indikator_iku_id'] = Pk::find($req->indikator_iku_id)->indikator_iku_id;
        $attr['tahun_id']         = Pk::find($req->indikator_iku_id)->tahun_id;
        $attr['jabatan_id']       = $this->jabatan->id;
        $attr['pk_id']            = $req->indikator_iku_id;
        Program::create($attr);
        toastr()->success('Program Disimpan');
        return redirect('/pegawai/program');        
    } 
}
