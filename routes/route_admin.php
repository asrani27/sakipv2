<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin_skpd/jabatan', 'JabatanController@index');
Route::post('/admin_skpd/jabatan/add', 'JabatanController@store');
Route::post('/admin_skpd/jabatan/add/sub', 'JabatanController@storeSub');
Route::post('/admin_skpd/jabatan/edit', 'JabatanController@update');
Route::post('/admin_skpd/jabatan/delete', 'JabatanController@destroy');

Route::get('/admin_skpd/unit-kerja', 'UnitKerjaController@index');
Route::post('/admin_skpd/unit-kerja/add', 'UnitKerjaController@store');
Route::post('/admin_skpd/unit-kerja/add/sub', 'UnitKerjaController@storeSub');
Route::post('/admin_skpd/unit-kerja/edit', 'UnitKerjaController@update');
Route::post('/admin_skpd/unit-kerja/delete', 'UnitKerjaController@destroy');

Route::get('/admin_skpd/tupoksi', 'TupoksiController@index');
Route::get('/admin_skpd/tugas/add/{id}', 'TupoksiController@addTugas');
Route::post('/admin_skpd/tugas/add/{id}', 'TupoksiController@storeTugas');
Route::get('/admin_skpd/tugas/delete/{id}', 'TupoksiController@deleteTugas');
Route::get('/admin_skpd/tugas/edit/{id}', 'TupoksiController@editTugas');
Route::post('/admin_skpd/tugas/edit/{id}', 'TupoksiController@updateTugas');

Route::get('/admin_skpd/fungsi/add/{id}', 'TupoksiController@addFungsi');
Route::post('/admin_skpd/fungsi/add/{id}', 'TupoksiController@storeFungsi');
Route::get('/admin_skpd/fungsi/delete/{id}', 'TupoksiController@deleteFungsi');
Route::get('/admin_skpd/fungsi/edit/{id}', 'TupoksiController@editFungsi');
Route::post('/admin_skpd/fungsi/edit/{id}', 'TupoksiController@updateFungsi');

Route::get('/admin_skpd/pegawai', 'PegawaiController@index');
Route::get('/admin_skpd/pegawai/add', 'PegawaiController@add');
Route::post('/admin_skpd/pegawai/add', 'PegawaiController@store');
Route::get('/admin_skpd/pegawai/edit/{id}', 'PegawaiController@edit');
Route::post('/admin_skpd/pegawai/edit/{id}', 'PegawaiController@update');
Route::get('/admin_skpd/pegawai/delete/{id}', 'PegawaiController@delete');
Route::get('/admin_skpd/pegawai/createuser/{id}', 'PegawaiController@createUser');

Route::get('/admin_skpd/pegawai/iku/{id}', 'IkuPegawaiController@ikupegawai');
Route::get('/admin_skpd/pegawai/iku/{id}/add', 'IkuPegawaiController@addikupegawai');
Route::post('/admin_skpd/pegawai/iku/{id}/add', 'IkuPegawaiController@storeikupegawai');
Route::get('/admin_skpd/pegawai/iku/edit/{pegawai_id}/{id}', 'IkuPegawaiController@editikupegawai');
Route::post('/admin_skpd/pegawai/iku/edit/{pegawai_id}/{id}', 'IkuPegawaiController@updateikupegawai');
Route::get('/admin_skpd/pegawai/iku/delete/{pegawai_id}/{id}', 'IkuPegawaiController@deleteikupegawai');
Route::get('/admin_skpd/pegawai/pk/{id}', 'IkuPegawaiController@pkpegawai');

Route::get('/admin_skpd/pegawai/iku/add_indikator/{pegawai_id}/{id}', 'IkuPegawaiController@addIndikator');
Route::post('/admin_skpd/pegawai/iku/add_indikator/{pegawai_id}/{id}', 'IkuPegawaiController@storeIndikator');

Route::get('/admin_skpd/mutasi', 'MutasiController@index');


Route::get('/admin_skpd/iku_pegawai', 'IkuPegawaiController@index');
