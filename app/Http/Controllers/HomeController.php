<?php

namespace App\Http\Controllers;

use App\Iku;
use App\Skpd;
use App\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            $skpdArr = Skpd::pluck('nama')->toArray();
            return view('skpd.home',compact('skpdArr'));
            
        }elseif(Auth::user()->hasRole('superadmin')){
            $skpdArr = Skpd::pluck('nama')->toArray();
            return view('admin.home',compact('skpdArr'));
        }elseif(Auth::user()->hasRole('walikota')){
            $data = UnitKerja::where('unit_kerja_id', null)->get();
            $result = $data->map(function($item){
                $item->iku = count($item->verifiku->where('verifikasi', 0));
                return $item;
            });            
            
            return view('walikota.home',compact('skpd','result'));
        }elseif(Auth::user()->hasRole('pegawai')){
            $bawahan = Auth::user()->pegawai->unitkerja->bawahan->pluck('id')->toArray();
            $iku = Iku::whereIn('unit_kerja_id', $bawahan)->where('verifikasi', 0)->get();
            return view('pegawai.home',compact('iku'));
        }
    }
}
