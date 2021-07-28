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
    return view('login.login');
});

Route::get('/jadwal', function () {
    return view('pages.jadwal');
});
Route::get('/jadwal', 'JadwalController@index');
Route::post('jadwal/create', 'JadwalController@create');
Route::get('jadwal/edit/{id}', 'JadwalController@edit');
Route::post('jadwal/update', 'JadwalController@update');
Route::get('jadwal/delete/{id}', 'JadwalController@delete');

Route::get('/absen', function () {
    return view('pages.absen');
});
//Absen
Route::get('/absen', 'AbsenController@index');
Route::post('absen/create', 'AbsenController@create');
Route::get('absen/edit/{id}', 'AbsenController@edit');
Route::post('absen/update', 'AbsenController@update');
Route::get('absen/delete/{id}', 'AbsenController@delete');

Route::get('/rekap_absen', function () {
    return view('pages.rekap_absen');
});
//RekapAbsen
Route::get('/rekap_absen', 'RekapAbsenController@index');
Route::post('rekap_absen/create', 'RekapAbsenController@create');
Route::get('rekap_absen/edit/{id}', 'RekapAbsenController@edit');
Route::post('rekap_absen/update', 'RekapAbsenController@update');
Route::get('rekap_absen/delete/{id}', 'RekapAbsenController@delete');
Route::post('/rekap_absen/import_excel', 'RekapAbsenController@import_excel');
Route::post('/', 'RekapAbsenController@storeData');

// Route::get('/penggajian', function () {
//     return view('pages.penggajian');
// });
Route::get('/penggajian', 'PenggajianController@index');
Route::get('penggajian/edit/{id}', 'PenggajianController@edit');
Route::post('penggajian/update', 'PenggajianController@update');
Route::get('/laporan', 'PenggajianController@laporan');

// Route::get('/laporan', function () {
//     return view('pages.laporan');
// });

Route::get('/sendEmail/{route}', 'mailController@sendEmail');

Route::get('/register', function(){
    return view('login.register');
});

// Route Ajax
Route::post('/ajax_login', 'ajaxController@login');
Route::post('/ajax_register', 'ajaxController@register');
Route::post('/ajax_logout', 'ajaxController@logout');

Route::get('autocomplete/fetch/nama', 'AutoCompleteController@autocompleteNama')->name('autocomplete.nama');
