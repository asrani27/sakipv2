<?php

use Illuminate\Support\Facades\Route;

Route::get('/pegawai/tupoksi', 'TupoksiController@index');
Route::get('/pegawai/tugas/add/{id}', 'TupoksiController@addTugas');
Route::post('/pegawai/tugas/add/{id}', 'TupoksiController@storeTugas');
Route::get('/pegawai/tugas/delete/{id}', 'TupoksiController@deleteTugas');
Route::get('/pegawai/tugas/edit/{id}', 'TupoksiController@editTugas');
Route::post('/pegawai/tugas/edit/{id}', 'TupoksiController@updateTugas');

Route::get('/pegawai/fungsi/add/{id}', 'TupoksiController@addFungsi');
Route::post('/pegawai/fungsi/add/{id}', 'TupoksiController@storeFungsi');
Route::get('/pegawai/fungsi/delete/{id}', 'TupoksiController@deleteFungsi');
Route::get('/pegawai/fungsi/edit/{id}', 'TupoksiController@editFungsi');
Route::post('/pegawai/fungsi/edit/{id}', 'TupoksiController@updateFungsi');

Route::get('/pegawai/iku', 'IkuController@index');
Route::get('/pegawai/iku/add', 'IkuController@add');
Route::post('/pegawai/iku/add', 'IkuController@store');
Route::get('/pegawai/iku/edit/{id}', 'IkuController@edit');
Route::post('/pegawai/iku/edit/{id}', 'IkuController@update');
Route::get('/pegawai/iku/delete/{id}', 'IkuController@delete');

Route::get('/pegawai/iku/verif/{id}', 'IkuController@verifIKU');

Route::get('/pegawai/pk', 'PkController@index');
Route::get('/pegawai/pk/add', 'PkController@add');
Route::post('/pegawai/pk/add', 'PkController@store');
Route::get('/pegawai/pk/edit/{id}', 'PkController@edit');
Route::post('/pegawai/pk/edit/{id}', 'PkController@update');
Route::get('/pegawai/pk/delete/{id}', 'PkController@delete');

Route::get('/pegawai/pk/indikator/{id}', 'PkController@indikator');
Route::post('/pegawai/pk/indikator/{id}', 'PkController@storeIndikator');

Route::get('/pegawai/pk/indikator/edit/{id}', 'PkController@editIndikator');
Route::post('/pegawai/pk/indikator/edit/{id}', 'PkController@updateIndikator');
Route::get('/pegawai/pk/indikator/delete/{id}', 'PkController@deleteIndikator');

Route::get('/pegawai/rencana-aksi', 'RAController@index');
Route::get('/pegawai/rencana-aksi/add', 'RAController@add');
Route::post('/pegawai/rencana-aksi/add', 'RAController@store');

Route::get('/pegawai/kinerja-triwulan', 'KinerjaController@kinerjaTriwulan');
