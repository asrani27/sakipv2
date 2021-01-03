<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::get();
        return view('admin.role.index', compact('data'));
    }
}
