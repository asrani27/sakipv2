<?php

use Illuminate\Support\Facades\Route;

Route::get('/walikota/iku/lihat/{id}', 'WalikotaController@lihatIKU');
Route::get('/walikota/iku/verif/{id}', 'WalikotaController@verifIKU');