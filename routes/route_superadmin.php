<?php

use Illuminate\Support\Facades\Route;

Route::get('/info', 'InfoController@index');
Route::get('/info/add', 'InfoController@add');
Route::get('/info/edit/{id}', 'InfoController@edit');
Route::post('/info/edit/{id}', 'InfoController@update');
Route::get('/info/delete/{id}', 'InfoController@delete');
Route::post('/info/add', 'InfoController@store');

Route::get('/data/skpd', 'SkpdController@index');
Route::get('/data/skpd/add', 'SkpdController@add');
Route::post('/data/skpd/add', 'SkpdController@store');
Route::get('/data/skpd/edit/{id}', 'SkpdController@edit');
Route::get('/data/skpd/buatuser/{id}', 'SkpdController@createUser');
Route::post('/data/skpd/buatuser/{id}', 'SkpdController@storeUser');
Route::post('/data/skpd/edit/{id}', 'SkpdController@update');
Route::get('/data/skpd/delete/{id}', 'SkpdController@delete');
Route::get('/data/skpd/resetpass/{id}', 'SkpdController@resetpass');

Route::get('/data/periode', 'PeriodeController@index');
Route::get('/data/periode/add', 'PeriodeController@add');
Route::post('/data/periode/add', 'PeriodeController@store');
Route::get('/data/periode/edit/{id}', 'PeriodeController@edit');
Route::post('/data/periode/edit', 'PeriodeController@update');
Route::get('/data/periode/delete/{id}', 'PeriodeController@delete');
Route::get('/data/periode/aktifkan/{id}', 'PeriodeController@aktifkan');

Route::post('/data/tahun/add', 'TahunController@store');
Route::get('/data/tahun/delete/{id}', 'TahunController@delete');

Route::get('/data/jabatan', 'JabatanController@index');
Route::post('/data/jabatan/add', 'JabatanController@store');
Route::post('/data/jabatan/add/sub', 'JabatanController@storeSub');
Route::post('/data/jabatan/edit', 'JabatanController@update');
Route::post('/data/jabatan/delete', 'JabatanController@destroy');

Route::get('/data/unit-kerja', 'UnitKerjaController@index');
Route::post('/data/unit-kerja/add', 'UnitKerjaController@store');
Route::post('/data/unit-kerja/add/sub', 'UnitKerjaController@storeSub');
Route::post('/data/unit-kerja/edit', 'UnitKerjaController@update');
Route::get('/data/unit-kerja/delete/{id}', 'UnitKerjaController@delete');
Route::post('/data/unit-kerja/delete', 'UnitKerjaController@destroy');

Route::get('/setting/role', 'RoleController@index');
Route::get('/setting/user', 'UserController@index');
Route::get('/setting/tanggalinput', 'TanggalController@index');

Route::get('/data/pegawai', 'PegawaiController@index');
Route::get('/data/pegawai/add', 'PegawaiController@add');
Route::post('/data/pegawai/add', 'PegawaiController@store');
Route::get('/data/pegawai/delete/{id}', 'PegawaiController@delete');
Route::get('/data/pegawai/edit/{id}', 'PegawaiController@edit');
Route::post('/data/pegawai/edit/{id}', 'PegawaiController@update');

Route::get('/data/pangkat', 'PangkatController@index');
Route::post('/data/pangkat/add', 'PangkatController@store');
Route::post('/data/pangkat/edit', 'PangkatController@update');
Route::get('/data/pangkat/delete/{id}', 'PangkatController@delete');

Route::get('/data/eselon', 'EselonController@index');
Route::post('/data/eselon/add', 'EselonController@store');
Route::post('/data/eselon/edit', 'EselonController@update');
Route::get('/data/eselon/delete/{id}', 'EselonController@delete');

Route::get('/sipd/rpjmd', 'APIController@rpjmd');
Route::post('/sipd/rpjmd/get', 'APIController@getRpjmd');
Route::get('/sipd/rpjmd/get', function () {
    return redirect('/sipd/rpjmd');
});
Route::get('/sipd/rpjmd/tampilkan/{periode}', 'APIController@tampilRpjmd');
Route::get('/sipd/rpjmd/simpan/{periode}', 'APIController@simpanRpjmd');
Route::get('/sipd/rpjmd-db/tampilkan/{periode}', 'APIController@DB_rpjmd');
Route::get('/sipd/rpjmd/delete/{id}', 'APIController@deleteRpjmd');

Route::get('/sipd/rkpd', 'APIController@rkpd');
Route::post('/sipd/rkpd/get', 'APIController@getRkpd');
Route::get('/sipd/rkpd/simpan/{tahun}', 'APIController@simpanRkpd');
Route::get('/sipd/rkpd/get', function () {
    return redirect('/sipd/rkpd');
});
Route::get('/sipd/rkpd/tampilkan/{tahun}/{kode_skpd}', 'APIController@tampilRkpd');
Route::get('/sipd/rkpd-db/tampilkan/{tahun}/{kode_skpd}', 'APIController@DB_rkpd');
