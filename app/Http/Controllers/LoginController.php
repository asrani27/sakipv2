<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use toastr;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password])) {
            if (Auth::user()->hasRole('pegawai')) {
                $checkJabatan = Auth::user()->pegawai->jabatan;
                if ($checkJabatan == null) {
                    Auth::logout();
                    toastr()->info('Anda Tidak Bisa Login, Karena Tidak memiliki Jabatan Struktural, Hub Admin SKPD Anda');
                    return redirect('/');
                } else {
                    return redirect('/home');
                }
            } else {
                return redirect('/home');
            }
        } else {
            toastr()->error('Username / Password Tidak Ditemukan');
            return back();
        }
    }
}
