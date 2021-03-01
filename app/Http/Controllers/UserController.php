<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('admin.user.index', compact('data'));
    }

    public function gantipass()
    {
        return view('admin.gantipass'); 
    }
    
    public function updategantipass(Request $req)
    {
        if($req->password != $req->password2){
            toastr()->error('Password Tidak sesuai');
        }else{
            $data = User::where('username', $req->username)->first();
            $data->password = bcrypt($req->password);
            $data->save();
            toastr()->success('Password Berhasil Diupdate');
        }
        return back(); 
    }
}
