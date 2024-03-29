<?php

use App\Info;
use App\Skpd;
use App\Tahun;
use App\Eselon;
use App\Jabatan;
use App\Pangkat;
use App\Pegawai;
use App\Periode;
use App\UnitKerja;
use Illuminate\Support\Facades\Auth;

function periodeAktif()
{
    return Periode::where('is_aktif', 1)->first();
}

function pengumuman()
{
    return Info::orderBy('id', 'DESC')->get();
}

function periode()
{
    return Periode::get();
}

function tahun()
{
    return Tahun::where('periode_id', periodeAktif()->id)->orderBy('tahun','ASC')->get();
}

function eselon()
{
    return Eselon::get();
}

function pangkat()
{
    return Pangkat::get();
}

function skpd()
{
    return Skpd::get();
}

function dinasSaya()
{
    return Auth::user()->skpd;
}

function jabDinas()
{
    $data = Jabatan::where('skpd_id', Auth::user()->skpd->id)->get()->map(function ($item) {
        if ($item->pegawai == null) {
            $item->status = 'tidak ada';
        } else {
            $item->status = 'ada';
        }
        return $item;
    })->where('status', '!=', 'ada');
    return $data;
}



function countSKPD()
{
    return count(Skpd::get());
}

function countASN()
{
    return count(Pegawai::get());
}

function biodata()
{
    $user = Auth::user();
    $data['nip'] = $user->pegawai->nip;
    $data['nama'] = $user->pegawai->nama;
    $data['jabatan'] = $user->pegawai->jabatan->nama;
    $data['skpd'] = $user->pegawai->skpd->nama;
    return $data;
}

function IkuAtasan()
{
    
}