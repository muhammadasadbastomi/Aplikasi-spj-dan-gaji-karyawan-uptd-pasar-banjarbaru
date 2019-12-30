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
       Route::prefix('user')->name('user.')->group(function(){
               Route::get('', 'UserController@get')->name('get');
               Route::get('{uuid}', 'UserController@find')->name('find');
               Route::post('', 'UserController@create')->name('create');
               Route::post('/update/{uuid}', 'UserController@update')->name('update');
               Route::delete('{uuid}', 'UserController@delete')->name('delete');
               });
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

       Route::prefix('jabatan')->name('jabatan.')->group(function(){
              Route::get('', 'JabatanController@get')->name('get');
              Route::get('{uuid}', 'JabatanController@find')->name('find');
              Route::post('', 'JabatanController@create')->name('create');
              Route::put('{uuid}', 'JabatanController@update')->name('update');
              Route::delete('{uuid}', 'JabatanController@delete')->name('delete');
       });

       Route::prefix('pegawai')->name('pegawai.')->group(function(){
              Route::get('', 'PegawaiController@get')->name('get');
              Route::get('{uuid}', 'PegawaiController@find')->name('find');
              Route::post('', 'PegawaiController@create')->name('create');
              Route::put('{uuid}', 'PegawaiController@update')->name('update');
              Route::delete('{uuid}', 'PegawaiController@delete')->name('delete');
       });

       Route::prefix('jenis-kendaraan')->name('jenis-kendaraan.')->group(function(){
              Route::get('', 'JenisController@get')->name('get');
              Route::get('{uuid}', 'JenisController@find')->name('find');
              Route::post('', 'JenisController@create')->name('create');
              Route::put('{uuid}', 'JenisController@update')->name('update');
              Route::delete('{uuid}', 'JenisController@delete')->name('delete');
       });

       Route::prefix('kendaraan')->name('kendaraan.')->group(function(){
              Route::get('', 'KendaraanController@get')->name('get');
              Route::get('{uuid}', 'KendaraanController@find')->name('find');
              Route::post('', 'KendaraanController@create')->name('create');
              Route::put('{uuid}', 'KendaraanController@update')->name('update');
              Route::delete('{uuid}', 'KendaraanController@delete')->name('delete');
       });
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/beranda', 'adminController@index')
       ->name('beranda');

//Route golongan
Route::get('/golongan', 'adminController@golonganIndex')
       ->name('golonganIndex');
Route::get('/golongan/cetak', 'adminController@golonganCetak')
       ->name('golonganCetak');
//akhir Route golongan

//Route jabatan
Route::get('/jabatan', 'adminController@jabatanIndex')
       ->name('jabatanIndex');
Route::get('/jabatan/cetak', 'adminController@jabatanCetak')
       ->name('jabatanCetak');
//akhir Route golongan

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

//route pajak
Route::get('/pajak', 'adminController@pajakIndex')
       ->name('pajakIndex');
Route::get('/pajak/cetak', 'adminController@pajakCetak')
       ->name('pajakCetak');
//akhir route pajak

//route kendaraan
Route::get('/kendaraan', 'adminController@kendaraanIndex')
       ->name('kendaraanIndex');
Route::get('/kendaraan/edit', 'adminController@kendaraanEdit')
       ->name('kendaraanEdit');
//akhir route kendaraan

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
Route::post('/pencairanAdd', 'adminController@pencairanStore')
       ->name('pencairanStore');
Route::get('/inputKeterangan', 'adminController@inputKeterangan')
       ->name('inputKeterangan');

//user
Route::get('/userIndex', 'adminController@userIndex')
       ->name('userIndex');
