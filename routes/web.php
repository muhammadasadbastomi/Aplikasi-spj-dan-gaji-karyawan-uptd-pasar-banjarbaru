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

Route::namespace('API')->prefix('api')->name('API.')->group(function(){
       Route::prefix('golongan')->name('golongan.')->group(function(){
               Route::get('', 'GolonganController@get')->name('get');
               Route::get('{uuid}', 'GolonganController@find')->name('find');
               Route::post('', 'GolonganController@create')->name('create');
               Route::put('{uuid}', 'GolonganController@update')->name('update');
               Route::delete('{uuid}', 'GolonganController@delete')->name('delete');
       });

       Route::prefix('pajak')->name('pajak.')->group(function(){
              Route::get('', 'PajakController@get')->name('get');
              Route::get('{uuid}', 'PajakController@find')->name('find');
              Route::post('', 'PajakController@create')->name('create');
              Route::put('{uuid}', 'PajakController@update')->name('update');
              Route::delete('{uuid}', 'PajakController@delete')->name('delete');
       });

       Route::prefix('keperluan')->name('keperluan.')->group(function(){
              Route::get('', 'KeperluanController@get')->name('get');
              Route::get('{uuid}', 'KeperluanController@find')->name('find');
              Route::post('', 'KeperluanController@create')->name('create');
       });
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/beranda', 'adminController@index')
       ->name('beranda');

Route::get('/golongan', 'adminController@golonganIndex')
       ->name('golonganIndex');

//route pegawai
Route::get('/pegawai', 'adminController@pegawaiIndex')
       ->name('pegawaiIndex');
Route::get('/pegawai/detail', 'adminController@pegawaiDetail')
       ->name('pegawaiDetail');
Route::get('/pegawai/edit', 'adminController@pegawaiEdit')
       ->name('pegawaiEdit');
//akhir route pegawai

//route keperluan
Route::get('/keperluan', 'adminController@keperluanIndex')
       ->name('keperluanIndex');
Route::get('/keperluan/edit', 'adminController@keperluanEdit')
       ->name('keperluanEdit');
//akhir route keperluan

//route keperluan
Route::get('/pajak', 'adminController@pajakIndex')
       ->name('pajakIndex');
Route::get('/pajak/edit', 'adminController@pajakEdit')
       ->name('pajakEdit');
//akhir route keperluan

//route keperluan
Route::get('/kendaraan', 'adminController@kendaraanIndex')
       ->name('kendaraanIndex');
Route::get('/kendaraan/edit', 'adminController@kendaraanEdit')
       ->name('kendaraanEdit');
//akhir route keperluan

//route standard harga
Route::get('/standardHarga', 'adminController@standardHargaIndex')
       ->name('standardHargaIndex');
Route::get('/standardHarga/edit', 'adminController@standardHargaEdit')
       ->name('standardHargaEdit');
//akhir standard harga

//pencairan
Route::get('/pencairanIndex', 'adminController@pencairanIndex')
       ->name('pencairanIndex');
Route::get('/pencairanAdd', 'adminController@pencairanAdd')
       ->name('pencairanAdd');
Route::get('/inputKeterangan', 'adminController@inputKeterangan')
       ->name('inputKeterangan');