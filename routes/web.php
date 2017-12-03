<?php


//route group auth for user
Route::group(['middleware' => 'auth'], function(){
	Route::get('/user/profile/{id}', 'UserController@show');
	Route::get('/user/history/{id}', 'UserController@HistoryUser');
	Route::get('/user/edit/{id}', 'UserController@edit');
	Route::put('/user/edit/{id}', 'UserController@update');
	Route::get('/pesan_paket', 'PaketController@createPaket');
	Route::post('/pesan_paket', 'PaketController@store');
	Route::get('/konfirmasi/{id}', 'PaymentController@confirm');
	Route::post('/konfirmasi/{id}/', 'PaymentController@store');
	Route::get('/user/history_booking/{id}', 'UserController@historyBooking');

});

//route group admin
Route::group(['middleware' => 'admin'], function(){
	//Route::get('/admin', 'AdminController@dashboard');
	Route::get('/admin/index', 'AdminController@index');
	Route::get('/admin/index', 'UserController@index');
	Route::get('/admin/daftar_paket', 'AdminController@daftar_paket');
	Route::get('/admin/{id}/edit_daftar_paket', 'AdminController@editDaftarPaket');
	Route::put('/admin/{id}/edit_daftar_paket', 'AdminController@updateDaftarPaket');
	Route::get('/admin/laporan_daftar_paket', 'AdminController@laporanDaftarPaket');
	Route::get('/admin/pembayaran', 'AdminController@laporanDaftarPembyaran');
	Route::get('/admin/daftar_harga_paket', 'PaketController@daftarHargaPaket');
	Route::get('/admin/create_paket_harga', 'PaketController@createPaketHarga');
	Route::post('/admin/create_paket_harga/', 'PaketController@storeHargaPaket');
	Route::get('/admin/edit_paket_harga/{id}', 'PaketController@editHargaPaket');
	Route::post('/admin/edit_paket_harga/{id}', 'PaketController@updateHargaPaket');
	Route::get('/admin/dashboard', 'AdminController@dashboard');
	Route::get('/admin/jadwal_driver/', 'AdminController@driver');
	Route::get('/admin/add_driver/{id}', 'AdminController@driverCreate');
	Route::put('/admin/add_driver/{id}', 'AdminController@driverStore');
	Route::get('/admin/edit_driver/{id}', 'AdminController@driverEdit');
	Route::put('/admin/edit_driver/{id}', 'AdminController@driverUpdate');

	//Route::get('/admin/dashboard', 'AdminController@chart');


});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/paket_harga', 'PaketController@index')->name('paket_harga');
Route::get('/gallery', 'GalleryController@index')->name('galerry');
