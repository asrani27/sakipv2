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
Route::get('/pegawai/iku/search', 'IkuController@search');
Route::get('/pegawai/iku/add_indikator/{id}', 'IkuController@add_indikator');
Route::get('/pegawai/iku/edit_indikator/{id}', 'IkuController@edit_indikator');
Route::post('/pegawai/iku/edit_indikator/{id}', 'IkuController@update_indikator');
Route::get('/pegawai/iku/hapus_indikator/{id}', 'IkuController@hapus_indikator');
Route::post('/pegawai/iku/add_indikator/{id}', 'IkuController@store_indikator');
Route::post('/pegawai/iku/add', 'IkuController@store');
Route::get('/pegawai/iku/edit/{id}', 'IkuController@edit');
Route::post('/pegawai/iku/edit/{id}', 'IkuController@update');
Route::get('/pegawai/iku/delete/{id}', 'IkuController@delete');
Route::post('/pegawai/iku/print', 'IkuController@pdf');

Route::get('/pegawai/iku/verif/{id}', 'IkuController@verifIKU');

Route::get('/pegawai/pk', 'PkController@index');
Route::get('/pegawai/pk/tahun/{tahun_id}', 'PkController@tahun');
Route::get('/pegawai/pk/target/{id}', 'PkController@add_target');
Route::get('/pegawai/pk/target/edit/{id}', 'PkController@edit_target');
Route::post('/pegawai/pk/target/edit/{id}', 'PkController@update_target');
Route::post('/pegawai/pk/target/{id}', 'PkController@store_target');

Route::get('/pegawai/pk/add', 'PkController@add');
Route::get('/pegawai/pk/update', 'PkController@update');
Route::get('/pegawai/pk/tampilkan', 'PkController@tampilkan');

Route::post('/pegawai/pk/add', 'PkController@store');
Route::get('/pegawai/pk/edit/{id}', 'PkController@edit');
Route::post('/pegawai/pk/edit/{id}', 'PkController@update');
Route::get('/pegawai/pk/delete/{id}', 'PkController@delete');

Route::get('/pegawai/pk/indikator/{id}', 'PkController@indikator');
Route::post('/pegawai/pk/indikator/{id}', 'PkController@storeIndikator');

Route::get('/pegawai/pk/indikator/edit/{id}', 'PkController@editIndikator');
Route::post('/pegawai/pk/indikator/edit/{id}', 'PkController@updateIndikator');
Route::get('/pegawai/pk/indikator/delete/{id}', 'PkController@deleteIndikator');

Route::get('/pegawai/program', 'ProgramController@index');
Route::get('/pegawai/program/add', 'ProgramController@add');
Route::post('/pegawai/program/add', 'ProgramController@store');
Route::get('/pegawai/program/edit/{id}', 'ProgramController@edit');
Route::post('/pegawai/program/edit/{id}', 'ProgramController@update');
Route::get('/pegawai/program/delete/{id}', 'ProgramController@delete');
Route::get('/pegawai/program/tampilkan', 'ProgramController@tampilkan');

Route::get('/pegawai/kegiatan', 'KegiatanController@index');
Route::get('/pegawai/kegiatan/add', 'KegiatanController@add');
Route::post('/pegawai/kegiatan/add', 'KegiatanController@store');
Route::get('/pegawai/kegiatan/edit/{id}', 'KegiatanController@edit');
Route::post('/pegawai/kegiatan/edit/{id}', 'KegiatanController@update');
Route::get('/pegawai/kegiatan/delete/{id}', 'KegiatanController@delete');
Route::get('/pegawai/kegiatan/tampilkan', 'KegiatanController@tampilkan');

Route::get('/pegawai/aktivitas', 'AktivitasController@index');
Route::get('/pegawai/aktivitas/add', 'AktivitasController@add');
Route::post('/pegawai/aktivitas/add', 'AktivitasController@store');
Route::get('/pegawai/aktivitas/edit/{id}', 'AktivitasController@edit');
Route::post('/pegawai/aktivitas/edit/{id}', 'AktivitasController@update');
Route::get('/pegawai/aktivitas/delete/{id}', 'AktivitasController@delete');
Route::get('/pegawai/aktivitas/tampilkan', 'AktivitasController@tampilkan');

Route::get('/pegawai/realisasi', 'RealisasiController@index');
Route::get('/pegawai/realisasi/add', 'RealisasiController@add');
Route::post('/pegawai/realisasi/add', 'RealisasiController@store');
Route::get('/pegawai/realisasi/edit/{id}', 'RealisasiController@edit');
Route::post('/pegawai/realisasi/edit/{id}', 'RealisasiController@update');
Route::get('/pegawai/realisasi/delete/{id}', 'RealisasiController@delete');
Route::get('/pegawai/realisasi/tampilkan', 'RealisasiController@tampilkan');

Route::get('/pegawai/rencana-aksi', 'RAController@index');
Route::get('/pegawai/rencana-aksi/tw1/{id}', 'RAController@add_tw1');
Route::get('/pegawai/rencana-aksi/tw1/{id}/{tahun}', 'RAController@add_tw1_tahun');
Route::get('/pegawai/rencana-aksi/tw2/{id}', 'RAController@add_tw2');
Route::get('/pegawai/rencana-aksi/tw2/{id}/{tahun}', 'RAController@add_tw2_tahun');
Route::get('/pegawai/rencana-aksi/tw3/{id}', 'RAController@add_tw3');
Route::get('/pegawai/rencana-aksi/tw3/{id}/{tahun}', 'RAController@add_tw3_tahun');
Route::get('/pegawai/rencana-aksi/tw4/{id}', 'RAController@add_tw4');
Route::get('/pegawai/rencana-aksi/tw4/{id}/{tahun}', 'RAController@add_tw4_tahun');
Route::post('/pegawai/rencana-aksi/tw1/{id}', 'RAController@store_tw1');
Route::post('/pegawai/rencana-aksi/tw1/{id}/{tahun}', 'RAController@store_tw1_tahun');
Route::post('/pegawai/rencana-aksi/tw2/{id}', 'RAController@store_tw2');
Route::post('/pegawai/rencana-aksi/tw2/{id}/{tahun}', 'RAController@store_tw2_tahun');
Route::post('/pegawai/rencana-aksi/tw3/{id}', 'RAController@store_tw3');
Route::post('/pegawai/rencana-aksi/tw3/{id}/{tahun}', 'RAController@store_tw3_tahun');
Route::post('/pegawai/rencana-aksi/tw4/{id}', 'RAController@store_tw4');
Route::post('/pegawai/rencana-aksi/tw4/{id}/{tahun}', 'RAController@store_tw4_tahun');
Route::get('/pegawai/rencana-aksi/program/{id}/{tahun}', 'RAController@program');
Route::post('/pegawai/rencana-aksi/program/{id}/{tahun}', 'RAController@update_program');
Route::get('/pegawai/rencana-aksi/tampilkan', 'RAController@tampilkan');

Route::get('/pegawai/rencana-aksi/{tahun}/pdf', 'RAController@export_pdf');

Route::get('/pegawai/rencana-aksi/add', 'RAController@add');
Route::get('/pegawai/rencana-aksi/eselon2/{id}', 'RAController@add2');
Route::post('/pegawai/rencana-aksi/eselon2/{id}', 'RAController@store2');
Route::post('/pegawai/rencana-aksi/add', 'RAController@store');

Route::get('/pegawai/kinerja-triwulan', 'KinerjaController@kinerjaTriwulan');
