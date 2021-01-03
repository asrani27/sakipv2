<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontendController@index');
Route::get('/rpjmd', 'FrontendController@rpjmd');
Route::get('/rpjmd/search', 'FrontendController@searchRpjmd');
Route::get('/pohon-kinerja', 'FrontendController@pohonKinerja');
Route::get('/pohon-kinerja/search', 'FrontendController@pohonSearch');
Route::get('/iku', 'FrontendController@iku');
Route::get('/iku/get_jabatan/{id}', 'FrontendController@ikuGetJab');
Route::get('/iku/search', 'FrontendController@searchIku');
Route::get('/perjanjian-kinerja', 'FrontendController@perjanjianKinerja');
Route::get('/perjanjian-kinerja/search', 'FrontendController@searchPk');
Route::get('/kinerja-triwulan', 'FrontendController@kinerjaTriwulan');
Route::get('/kinerja-tahunan', 'FrontendController@kinerjaTahunan');
Route::get('/login', 'FrontendController@login');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/cek-username/{param}', 'FrontendController@cekUsername');
