<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $skpd_id = Auth::user()->skpd->id;
            $data = Pegawai::where('skpd_id', $skpd_id)->paginate(10);
            return view('skpd.pegawai.index', compact('data'));
        } else {
            $data = Pegawai::paginate(10);
            return view('admin.pegawai.index', compact('data'));
        }
    }

    public function search()
    {
        $search = request()->get('search');
        $data = Pegawai::where('skpd_id', Auth::user()->skpd->id)->where('nip', 'like', '%'.$search.'%')
        ->orWhere(function($query)use ($search){
            $query->where('skpd_id', Auth::user()->skpd->id)->where('nama','LIKE','%'.$search.'%');
        })->paginate(10);
        return view('skpd.pegawai.index', compact('data'));
        
    }

    public function add()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('skpd.pegawai.add');
        } else {
            return view('admin.pegawai.add');
        }
    }

    public function edit($id)
    {
        $data = Pegawai::find($id);
        if (Auth::user()->hasRole('admin')) {
            return view('skpd.pegawai.edit', compact('data'));
        } else {
            return view('admin.pegawai.edit', compact('data'));
        }
    }

    public function store(Request $req)
    {
        $check = Pegawai::where('nip', $req->nip)->first();
        if ($check == null) {
            $attr = $req->all();
            Pegawai::create($attr);
            toastr()->success('Pegawai Berhasil Disimpan');
            if (Auth::user()->hasRole('admin')) {
                return redirect('/admin_skpd/pegawai');
            } else {
                return redirect('/data/pegawai');
            }
        } else {
            toastr()->info('NIP Sudah Ada');
            $req->flash();
            return back();
        }
    }

    public function update(Request $req, $id)
    {
        $attr = $req->all();
        Pegawai::find($id)->update($attr);
        toastr()->success('Pegawai Berhasil DiUpdate');
        if (Auth::user()->hasRole('admin')) {
            return redirect('/admin_skpd/pegawai');
        } else {
            return redirect('/data/pegawai');
        }
    }

    public function delete($id)
    {
        try{
            Pegawai::find($id)->user->delete();
            Pegawai::find($id)->delete();
            toastr()->success('Pegawai Berhasil DiHapus');
            return back();
        }
        catch (\Exception $e)
        {
            toastr()->error('Tidak Bisa Di Hapus');
            return back();
        }
    }

    public function createUser($id)
    {
        $data = Pegawai::find($id);
        if ($data->nip == null) {
            toastr()->error('NIP anda Kosong, Harap Isi Dulu');
            return back();
        } else {
            $checkUser = User::where('username', $data->nip)->first();
            if ($checkUser == null) {
                $rolePegawai = Role::where('name', 'pegawai')->first();
                $attr['username'] = $data->nip;
                $attr['password'] = bcrypt('654321');
                $attr['name'] = $data->nama;
                //Create User
                $user = User::create($attr);

                //Update User_id In Pegawai
                $data->user_id = $user->id;
                $data->save();

                //Create Role Pegawai
                $user->roles()->attach($rolePegawai);

                toastr()->success('Username : NIP anda, Password : 654321');
                return back();
            } else {
                toastr()->error('Akun Sudah Ada.');
                return back();
            }
        }
    }
}
