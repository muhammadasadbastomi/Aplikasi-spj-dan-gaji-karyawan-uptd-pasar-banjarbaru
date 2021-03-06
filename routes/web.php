<?php

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
              Route::post('update/{uuid}', 'PegawaiController@update')->name('update');
              Route::delete('{uuid}', 'PegawaiController@delete')->name('delete');
       });

       Route::prefix('kendaraan')->name('kendaraan.')->group(function(){
              Route::get('', 'KendaraanController@get')->name('get');
              Route::get('{uuid}', 'KendaraanController@find')->name('find');
              Route::post('', 'KendaraanController@create')->name('create');
              Route::put('{uuid}', 'KendaraanController@update')->name('update');
              Route::delete('{uuid}', 'KendaraanController@delete')->name('delete');
       });

       Route::prefix('item')->name('item.')->group(function(){
              Route::get('', 'ItemController@get')->name('get');
              Route::get('{uuid}', 'ItemController@find')->name('find');
              Route::post('', 'ItemController@create')->name('create');
              Route::put('{uuid}', 'ItemController@update')->name('update');
              Route::delete('{uuid}', 'ItemController@delete')->name('delete');
       });

       Route::prefix('pencairan')->name('pencairan.')->group(function(){
              Route::get('', 'PencairanController@get')->name('get');
              Route::get('{uuid}', 'PencairanController@find')->name('find');
              Route::post('', 'PencairanController@create')->name('create');
              Route::put('{uuid}', 'PencairanController@update')->name('update');
              Route::delete('{uuid}', 'PencairanController@delete')->name('delete');
       });

       Route::prefix('rincian')->name('rincian.')->group(function(){
              Route::get('get/{uuid}', 'RincianController@get')->name('get');
              Route::get('{uuid}', 'RincianController@find')->name('find');
              Route::post('', 'RincianController@create')->name('create');
              Route::put('{uuid}', 'RincianController@update')->name('update');
              Route::delete('{uuid}', 'RincianController@delete')->name('delete');
       });

       Route::prefix('pptk')->name('pptk.')->group(function(){
              Route::get('', 'PptkController@get')->name('get');
              Route::get('{uuid}', 'PptkController@find')->name('find');
              Route::post('', 'PptkController@create')->name('create');
              Route::put('{uuid}', 'PptkController@update')->name('update');
              Route::delete('{uuid}', 'PptkController@delete')->name('delete');
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
Route::get('/pegawai/detail/{uuid}', 'adminController@pegawaiDetail')
       ->name('pegawaiDetail');
Route::get('/pegawai/Cetak', 'adminController@pegawaiCetak')
       ->name('pegawaiCetak');
Route::get('/pegawai/filter/jabatan', 'adminController@pegawaiFilterJabatan')
       ->name('pegawaiFilterJabatan');
Route::post('/pegawai/filter/jabatan', 'adminController@pegawaiFilterJabatanCetak')
       ->name('pegawaiFilterJabatanCetak');
Route::get('/pegawai/filter/golongan', 'adminController@pegawaiFilterGolongan')
       ->name('pegawaiFilterGolongan');
Route::post('/pegawai/filter/golongan', 'adminController@pegawaiFilterGolonganCetak')
       ->name('pegawaiFilterGolonganCetak');
Route::get('/pegawai/profil/cetak/{id}', 'adminController@profilPegawaiCetak')
       ->name('profilPegawaiCetak');
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
Route::get('/kendaraan/Cetak', 'adminController@kendaraanCetak')
       ->name('kendaraanCetak');
Route::get('/kendaraan/filter', 'adminController@kendaraanFilter')
       ->name('kendaraanFilter');
Route::post('/kendaraan/filter', 'adminController@kendaraanFilterCetak')
       ->name('kendaraanFilterCetak');
Route::get('/sk/cetak/{uuid}', 'adminController@skCetak')
       ->name('skCetak');
//akhir route kendaraan

//route standard harga
Route::get('/standardHarga', 'adminController@standardHargaIndex')
       ->name('standardHargaIndex');
Route::get('/item/Cetak', 'adminController@itemCetak')
       ->name('itemCetak');
Route::get('/item/Filter', 'adminController@itemFilter')
       ->name('itemFilter');
Route::post('/item/Filter', 'adminController@itemFilterCetak')
       ->name('itemFilterCetak');
//akhir standard harga

//pencairan
Route::get('/pencairanIndex', 'adminController@pencairanIndex')
       ->name('pencairanIndex');
Route::get('/pencairanAdd', 'adminController@pencairanAdd')
       ->name('pencairanAdd');
Route::post('/pencairanAdd', 'adminController@pencairanStore')
       ->name('pencairanStore');
Route::get('/pencairan/detail/{uuid}', 'adminController@pencairanDetail')
       ->name('pencairanDetail');
Route::get('/inputKeterangan', 'adminController@inputKeterangan')
       ->name('inputKeterangan');
Route::get('/notaPencairan/cetak/{id}', 'adminController@notaPencairan')
       ->name('notaPencairan'); 
Route::get('pencairan/cetak', 'adminController@pencairanCetak')
       ->name('pencairanCetak');
Route::get('pencairan/filter', 'adminController@pencairanFilter')
       ->name('pencairanFilter');
Route::post('pencairan/filter', 'adminController@pencairanFilterCetak')
       ->name('pencairanFilterCetak');
Route::get('pencairan/filter/waktu', 'adminController@pencairanFilterWaktu')
       ->name('pencairanFilterWaktu');
Route::post('pencairan/filter/waktu', 'adminController@pencairanFilterWaktuCetak')
       ->name('pencairanFilterWaktuCetak');      

//pptk
Route::get('/pptkIndex', 'adminController@pptkIndex')
       ->name('pptkIndex');
Route::get('/pptk/cetak', 'adminController@pptkCetak')
       ->name('pptkCetak');

//user
Route::get('/userIndex', 'adminController@userIndex')
       ->name('userIndex');
Route::get('/user/cetak', 'adminController@userCetak')
       ->name('userCetak');
