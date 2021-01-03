<?php

namespace App\Http\Controllers;

use App\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function store(Request $req)
    {
        Tahun::create($req->all());
        toastr()->success('Tahun Berhasil DiSimpan');
        return back();
    }

    public function delete($id)
    {
        Tahun::find($id)->delete();
        toastr()->success('Tahun Berhasil DiHapus');
        return back();
    }
}
