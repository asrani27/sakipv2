<?php

namespace App\Http\Controllers;

use App\Iku;
use App\Skpd;
use App\Jabatan;
use App\Pegawai;
use App\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            //$skpdArr = Skpd::pluck('nama')->toArray();
            $countPegawai = Pegawai::where('skpd_id', Auth::user()->skpd->id)->count();
            return view('skpd.home',compact('countPegawai'));
            
        }elseif(Auth::user()->hasRole('superadmin')){
            $skpdArr = Skpd::pluck('nama')->toArray();
            return view('admin.home',compact('skpdArr'));

        }elseif(Auth::user()->hasRole('walikota')){
            $data = Jabatan::where('jabatan_id', null)->get();
            $result = $data->map(function($item){
                $item->iku = count($item->verifiku->where('verifikasi', 0));
                return $item;
            });            
            
            return view('walikota.home',compact('result'));
        }elseif(Auth::user()->hasRole('pegawai')){
            $bawahan = Auth::user()->pegawai->jabatan->bawahan->pluck('id')->toArray();
            $iku = [];
            return view('pegawai.home',compact('iku'));
        }
    }
}
