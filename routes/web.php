<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

include('route_frontend.php');

Route::group(['middleware' => ['auth', 'role:superadmin|admin|pegawai']], function () {
    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    include('route_superadmin.php');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    include('route_admin.php');
});

Route::group(['middleware' => ['auth', 'role:pegawai']], function () {
    include('route_pegawai.php');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
