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

Route::get('/', 'PelangganController@index')->name('pelanggan');
Route::post('/cari', 'PelangganController@cari')->name('cari');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//grup untuk bagian ADMIN
Route::group(['prefix' => 'admin'], function()
{   
    // route untuk menu katgpri
    Route::get('/kategori', 'KategoriController@index')->name('kategori');
    Route::post('/kategori/tambah', 'KategoriController@addKategori')->name('addKategori');
    Route::get('/kategori/edit/{id}', 'KategoriController@editKategori')->name('editKategori');
    Route::post('/kategori/update', 'KategoriController@updateKategori')->name('updateKategori');
    Route::get('/kategori/hapus{id}', 'KategoriController@hapusKategori')->name('hapusKategori');
    // .end route menu kategori

    //route untuk produk
    Route::get('/produk', 'ProdukController@index')->name('produk');
    Route::post('/produk/tambah', 'ProdukController@addProduk')->name('addProduk');
    Route::get('/produk/edit/{id}', 'ProdukController@editproduk')->name('editProduk');
    Route::post('/produk/update', 'ProdukController@updateProduk')->name('updateProduk');
    Route::get('/produk/hapus{id}', 'ProdukController@hapusProduk')->name('hapusProduk');
    Route::get('/produk/kategori/{id}/{nama}', 'ProdukController@tampilKategori')->name('tampilKategori');
    Route::post('/produk/tambah_kategori', 'ProdukController@tambahKategori')->name('tambahKategori');
    Route::get('/produk/hapus_produk/{id}', 'ProdukController@hapusKategoriProduk')->name('hapusKategoriProduk');
    // .end route untuk produk

    //route lihat produk
    Route::get('/lihat_produk', 'LihatProdukController@index')->name('lihat_produk');
    Route::post('/lihat_produk/cari', 'LihatProdukController@cariProduk')->name('cariProduk');
    // .End lihat produk
});
//end grub ADMIN
