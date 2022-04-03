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
Route::get('/admin_skpd/pegawai/search', 'PegawaiController@search');
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

Route::post('/admin_skpd/pegawai/iku/print', 'IkuPegawaiController@printikupegawai');
Route::get('/admin_skpd/pegawai/iku/add_indikator/{pegawai_id}/{id}', 'IkuPegawaiController@addIndikator');
Route::post('/admin_skpd/pegawai/iku/add_indikator/{pegawai_id}/{id}', 'IkuPegawaiController@storeIndikator');

Route::get('/admin_skpd/pegawai/iku/edit_indikator/{pegawai_id}/{id}', 'IkuPegawaiController@editIndikator');
Route::post('/admin_skpd/pegawai/iku/edit_indikator/{pegawai_id}/{id}', 'IkuPegawaiController@updateIndikator');
Route::get('/admin_skpd/pegawai/iku/hapus_indikator/{pegawai_id}/{id}', 'IkuPegawaiController@hapusIndikator');

Route::get('/admin_skpd/pegawai/pk/{id}', 'PkPegawaiController@pkpegawai');
Route::get('/admin_skpd/pegawai/pk/{pegawai_id}/tampilkan', 'PkPegawaiController@tampilkan');
Route::get('/admin_skpd/pegawai/pk/{pegawai_id}/target/{id}', 'PkPegawaiController@add_target');
Route::get('/admin_skpd/pegawai/pk/{pegawai_id}/target/edit/{id}', 'PkPegawaiController@edit_target');
Route::post('/admin_skpd/pegawai/pk/{pegawai_id}/target/edit/{id}', 'PkPegawaiController@update_target');
Route::post('/admin_skpd/pegawai/pk/{pegawai_id}/target/{id}', 'PkPegawaiController@store_target');

Route::get('/admin_skpd/mutasi', 'MutasiController@index');

Route::get('/admin_skpd/kinerjatriwulan', 'KinerjaTriwulanController@index');
Route::get('/admin_skpd/kinerjatriwulan/struktur/{id}', 'KinerjaTriwulanController@kinerja');

Route::get('/admin_skpd/kinerjatriwulan/struktur/{id}/tahun/add', 'KinerjaTriwulanController@addTahun');
Route::post('/admin_skpd/kinerjatriwulan/struktur/{id}/tahun/add', 'KinerjaTriwulanController@storeTahun');

Route::get('/admin_skpd/kinerjatriwulan/struktur/{id}/kinerja/add', 'KinerjaTriwulanController@addKinerja');
Route::post('/admin_skpd/kinerjatriwulan/struktur/{id}/kinerja/add', 'KinerjaTriwulanController@storeKinerja');

Route::get('/admin_skpd/kinerjatriwulan/struktur/{id}/indikator/add', 'KinerjaTriwulanController@addIndikator');
Route::post('/admin_skpd/kinerjatriwulan/struktur/{id}/indikator/add', 'KinerjaTriwulanController@storeIndikator');
