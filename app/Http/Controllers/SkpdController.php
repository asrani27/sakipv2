<?php

namespace App\Http\Controllers;

use App\Role;
use App\Skpd;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkpdController extends Controller
{
    public function index()
    {
        $data = Skpd::all();
        return view('admin.skpd.index', compact('data'));
    }

    public function edit($id)
    {
        $data = Skpd::find($id);
        return view('admin.skpd.edit', compact('data'));
    }

    public function add()
    {
        return view('admin.skpd.add');
    }

    public function store(Request $req)
    {
        Skpd::create($req->all());
        toastr()->success('Data SKPD Berhasil DiSimpan');
        return redirect('/data/skpd');
    }
    public function update(Request $req, $id)
    {
        Skpd::find($id)->update($req->all());
        toastr()->success('Data SKPD Berhasil Diupdate');
        return redirect('/data/skpd');
    }

    public function delete($id)
    {
        try {
            Skpd::find($id)->delete();
            toastr()->success('Data SKPD Berhasil DiHapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus, karena memiliki, jabatan/tupoksi/kegiatan yang terkait');
            return back();
        }
    }

    public function createUser($id)
    {
        $idskpd = $id;
        return view('admin.skpd.create_user', compact('idskpd'));
    }

    public function storeUser(Request $req, $id)
    {
        DB::transaction(function () use ($req, $id) {
            $roleSkpd = Role::where('name', 'admin')->first();
            $skpd = Skpd::find($id);
            $attr = $req->all();
            $attr['password'] = bcrypt($req->password);
            $attr['name'] = $skpd->nama;
            //Create User
            $user = User::create($attr);
            //Update SKPD User
            $skpd->user_id = $user->id;
            $skpd->save();
            //Sync Role SKPD
            $user->roles()->attach($roleSkpd);
        });
        toastr()->success('User Admin SKPD Berhasil Dibuat');
        return redirect('/data/skpd');
    }

    public function resetpass($id)
    {
        $data = Skpd::find($id)->user;
        $data->password = bcrypt('123456');
        $data->save();
        toastr()->success('Password Baru : 123456');
        return back();
    }
}
