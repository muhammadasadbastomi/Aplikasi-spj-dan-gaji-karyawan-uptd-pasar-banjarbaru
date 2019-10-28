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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/beranda', 'adminController@index')
       ->name('beranda');

//route pegawai
Route::get('/pegawai', 'adminController@pegawaiIndex')
       ->name('pegawaiIndex');
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