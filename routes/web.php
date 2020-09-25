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


// Route::get('/', function ()
// {
//     return view('guesthome');
// });

Route::get('/', 'GuestController@index')->name('guesthome');

Route::get('/beritaIndex', 'GuestController@beritaIndex')->name('guestberita');
Route::get('/beritaIndex/detail/{id}','BeritaController@detail');

Route::get('/kegiatanIndex', 'GuestController@kegiatanIndex')->name('guestkegiatan');
Route::get('/kegiatanIndex/detail/{id}','KegiatanController@detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', 'GuestController@index')->name('home');

// Route::middleware(['auth'])->group(function (){
//     Route::get('/home', 'HomeController@index')->name('home');
//     Route::middleware(['admin'])->group(function (){
        Route::get('/adminapi/list','AdminController@getAllAdmin')->name('admin.list');
        Route::resource('admin', 'AdminController');        
        Route::get('/beritaapi/list','BeritaController@getAllBerita')->name('berita.list');
        Route::resource('berita', 'BeritaController');        
        Route::get('/kegiatanapi/list','KegiatanController@getAllKegiatan')->name('kegiatan.list');
        Route::resource('kegiatan', 'KegiatanController');
        Route::get('/bannerapi/list','BannerController@getAllBanner')->name('banner.list');
        Route::resource('banner', 'BannerController');
        Route::get('/profilapi/list','ProfilController@getAllProfil')->name('profil.list');
        Route::resource('profil', 'ProfilController');
        Route::get('/imgprofilapi/list','ImgprofilController@getAllImgprofil')->name('imgprofil.list');
        Route::resource('imgprofil', 'ImgprofilController');
        Route::get('/kategoriapi/list','KategoriController@getAllKategori')->name('kategori.list');
        Route::resource('kategori', 'KategoriController');
        Route::get('/galleryapi/list','GalleryController@getAllGallery')->name('gallery.list');
        Route::resource('gallery', 'GalleryController');
        
//     });
// });





// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
