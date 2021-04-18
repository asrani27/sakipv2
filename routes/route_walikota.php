<?php

use Illuminate\Support\Facades\Route;

Route::get('/walikota/iku/lihat/{id}', 'WalikotaController@lihatIKU');
Route::get('/walikota/iku/verif/{id}', 'WalikotaController@verifIKU');
Route::get('/walikota/iku', 'WalikotaController@iku');
Route::get('/walikota/iku/add', 'WalikotaController@addIku');
Route::post('/walikota/iku/add', 'WalikotaController@storeIku');
Route::get('/walikota/iku/edit/{id}', 'WalikotaController@editIku');
Route::post('/walikota/iku/edit/{id}', 'WalikotaController@updateIku');
Route::get('/walikota/iku/delete/{id}', 'WalikotaController@deleteIku');
Route::get('/walikota/iku/add_indikator/{id}', 'WalikotaController@add_indikator');
Route::post('/walikota/iku/add_indikator/{id}', 'WalikotaController@store_indikator');
Route::get('/walikota/iku/hapus_indikator/{id}', 'WalikotaController@hapus_indikator');
Route::get('/walikota/iku/edit_indikator/{id}', 'WalikotaController@edit_indikator');
Route::post('/walikota/iku/edit_indikator/{id}', 'WalikotaController@update_indikator');