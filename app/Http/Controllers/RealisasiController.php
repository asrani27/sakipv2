<?php

namespace App\Http\Controllers;

use App\Iku2;
use App\Tahun;
use App\Realisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealisasiController extends Controller
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
        $data = Realisasi::where('jabatan_id', $this->jabatan->id)->paginate(10);
        return view('pegawai.realisasi.index',compact('data','tahun'));
    }

    public function add()
    {
        $tahun = $this->tahun();
        $indikator = Iku2::where('jabatan_id', $this->jabatan->id)->get();
        return view('pegawai.realisasi.add',compact('tahun','indikator'));
    }
}
