<?php

use App\Info;
use App\Skpd;
use App\Tahun;
use App\Eselon;
use App\Jabatan;
use App\Pangkat;
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
    return Tahun::get();
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
    return UnitKerja::where('skpd_id', Auth::user()->skpd->id)->get()->map(function ($item) {
        if ($item->pegawai == null) {
            $item->status = 'tidak ada';
        } else {
            $item->status = 'ada';
        }
        return $item;
    })->where('status', '!=', 'ada');
}
