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

Route::middleware(['belum_login'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('/');
    Route::post('aksilogin', 'DashboardController@loginAdmin')->name('aksilogin');
    Route::get('register', 'DashboardController@register')->name('register');
    Route::post('aksiregister', 'DashboardController@registerAdmin')->name('aksiregister');
});

Route::middleware(['sudah_login'])->group(function () {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('tabel', 'DashboardController@tabel')->name('tabel');
    Route::get('logout', 'DashboardController@logout')->name('logout');

    // admin
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('admin/create', 'AdminController@create')->name('admin.create');
    Route::post('admin', 'AdminController@store')->name('admin.store');
    Route::get('admin/{admin}', 'AdminController@edit')->name('admin.edit');
    Route::put('admin/{admin}', 'AdminController@update')->name('admin.update');
    Route::delete('admin/{admin}', 'AdminController@destroy')->name('admin.delete');

    // guru
    Route::get('guru', 'GuruController@index')->name('guru');
    Route::get('guru/create', 'GuruController@create')->name('guru.create');
    Route::post('guru', 'GuruController@store')->name('guru.store');
    Route::get('guru/{guru}', 'GuruController@edit')->name('guru.edit');
    Route::put('guru/{guru}', 'GuruController@update')->name('guru.update');
    Route::delete('guru/{guru}', 'GuruController@destroy')->name('guru.delete');

    // sekolah
    Route::get('sekolah', 'SekolahController@index')->name('sekolah');
    Route::get('sekolah/create', 'SekolahController@create')->name('sekolah.create');
    Route::post('sekolah', 'SekolahController@store')->name('sekolah.store');
    Route::get('sekolah/{sekolah}', 'SekolahController@edit')->name('sekolah.edit');
    Route::put('sekolah/{sekolah}', 'SekolahController@update')->name('sekolah.update');
    Route::delete('sekolah/{sekolah}', 'SekolahController@destroy')->name('sekolah.delete');

    // kriteria
    Route::get('kriteria', 'KriteriaController@index')->name('kriteria');
    Route::get('kriteria/create', 'KriteriaController@create')->name('kriteria.create');
    Route::post('kriteria', 'KriteriaController@store')->name('kriteria.store');
    Route::get('kriteria/{kriteria}', 'KriteriaController@edit')->name('kriteria.edit');
    Route::put('kriteria/{kriteria}', 'KriteriaController@update')->name('kriteria.update');
    Route::delete('kriteria/{kriteria}', 'KriteriaController@destroy')->name('kriteria.delete');

    // kriteria-penilaian
    Route::get('kriteria-penilaian', 'KriteriaPenilaianController@index')->name('kriteria-penilaian');
    Route::get('kriteria-penilaian/create', 'KriteriaPenilaianController@create')->name('kriteria-penilaian.create');
    Route::post('kriteria-penilaian', 'KriteriaPenilaianController@store')->name('kriteria-penilaian.store');
    Route::get('kriteria-penilaian/{kriteria_penilaian}', 'KriteriaPenilaianController@edit')->name('kriteria-penilaian.edit');
    Route::put('kriteria-penilaian/{kriteria_penilaian}', 'KriteriaPenilaianController@update')->name('kriteria-penilaian.update');
    Route::delete('kriteria-penilaian/{kriteria_penilaian}', 'KriteriaPenilaianController@destroy')->name('kriteria-penilaian.delete');

    // analisa
    Route::get('analisa', 'AnalisaController@index')->name('analisa');
    Route::get('cetak-analisa', 'AnalisaController@cetak')->name('cetak-analisa');
    
});
