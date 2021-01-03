<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use Yoeunes\Toastr\Toastr;

class InfoController extends Controller
{
    public function index()
    {
        $data = Info::orderBy('id', 'desc')->get();
        return view('admin.info.index', compact('data'));
    }

    public function add()
    {
        return view('admin.info.add');
    }

    public function edit($id)
    {
        $data = Info::find($id);
        return view('admin.info.edit', compact('data'));
    }

    public function store(Request $req)
    {
        Info::create($req->all());
        toastr()->success('Pengumuman Berhasil Disimpan');
        return redirect('/info');
    }

    public function update(Request $req, $id)
    {
        Info::find($id)->update($req->all());
        toastr()->success('Pengumuman Berhasil Diupdate');
        return redirect('/info');
    }

    public function delete($id)
    {
        Info::find($id)->delete();
        toastr()->success('Pengumuman Berhasil Dihapus');
        return redirect('/info');
    }
}
