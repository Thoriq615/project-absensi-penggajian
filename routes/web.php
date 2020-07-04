<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* page menu */
Route::get('/', function () {
    return view('pages.index');
});

Route::get('/jadwal', function () {
    return view('pages.jadwal');
});

Route::get('/absen', function () {
    return view('pages.absen');
});

Route::get('/rekap_absen', function () {
    return view('pages.rekap_absen');
});

Route::get('/penggajian', function () {
    return view('pages.penggajian');
});

Route::get('/laporan', function () {
    return view('pages.laporan');
});
