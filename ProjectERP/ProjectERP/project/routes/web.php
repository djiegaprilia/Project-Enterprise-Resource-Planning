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
//Routing dasar
Route::get('/tes-method-route', function(){
    return view('welcome');
});
Route::get('/get', function(){
    return 'Tes route method HTTP get';
});
Route::post('/post', function(){
    return 'Tes route dengan method HTTP post';
});
Route::put('/put', function(){
    return 'Tes route dengan method HTTP put';
});
Route::delete('/delete', function(){
    return 'Test route dengan method HTTP delete';
});
//Routing berparameter
Route::get('/page/{page_number}', function($page_number){
    return "<h1>Halaman".$page_number."</h1>"."Laravel emang keren.";
});
//Routing berparameter opsional
Route::get('/parameter/{parameter1?}', function($parameter1="Richa"){
    return "Parameter nama adalah ".$parameter1;
});
//Routing group
Route::group(['prefix'=>'test'], function(){
    //route dasar method get
    Route::get('/get', function(){
        return "Tes method route GET";
    });
    //Route dasar method post
    Route::post('/post', function(){
        return "Test Route method POST";
    });
    //Route dasar method put
    Route::put('/put', function(){
        return "Test method route PUT";
    });
    //Route dasar method delete
    Route::delete('/delete', function(){
        return "Tes method route DELETE";
    });
});
//Route untuk function CRUP pemesanan
Route::resource('pemesanan', 'PemesananController');
Route::get('pemesanan/delete/{id}', 'PemesananController@delete');
Route::post('pemesanan/update', 'PemesananController@update');

//Route untuk function CRUP pemesanan
Route::resource('keuangan', 'KeuanganController');
Route::get('keuangan/delete/{id}', 'KeuanganController@delete');
Route::post('keuangan/update', 'KeuanganController@update');
Route::resource('cetakUang', 'KeuanganController');
Route::get('cetakUang', 'KeuanganController@cetakUang');

Route::resource('cetakLaba', 'LabarugiController');
Route::get('cetakLaba', 'LabarugiController@cetakUang');

//Route untuk function CRUP pemesanan
Route::resource('labarugi', 'LabarugiController');
Route::get('labarugi/delete/{id}', 'LabarugiController@delete');
Route::post('labarugi/update', 'LabarugiController@update');

Route::resource('cetakpemesanan','PemesananController');
Route::get('cetakpemesanan', 'PemesananController@cetakPesan');

Route::resource('cetakGaji','data_gajiController');
Route::get('cetakGaji', 'data_gajiController@cetakGaji');

Route::resource('barang', 'BarangController');
Route::get('barang/delete/{id}', 'BarangController@delete');
Route::post('barang/update', 'BarangController@update');

Route::resource('data_gaji','data_gajiController');
Route::get('data_gaji/delete/{id}','data_gajiController@delete');
Route::post('data_gaji/update','data_gajiController@update');

Route::resource('data_karyawan','data_karyawanController');
Route::get('data_karyawan/delete/{id}','data_karyawanController@delete');
Route::post('data_karyawan/update','data_karyawanController@update');

Route::resource('rekrut_pegawai','rekrut_pegawaiController');
Route::get('rekrut_pegawai/delete/{id}','rekrut_pegawaiController@delete');
Route::post('rekrut_pegawai/update','rekrut_pegawaiController@update');

Route::resource('staff_hrm','staff_hrmController');
Route::get('staff_hrm/delete/{id}','staff_hrmController@delete');
Route::post('staff_hrm/update','staff_hrmController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pengiriman', 'PengirimanController');
Route::get('pengiriman/delete/{id}', 'ProdukController@delete');
Route::post('pengiriman/update', 'ProdukController@update');

Route::resource('pesanan_pelanggan', 'Pesanan_pelangganController');
Route::get('pesanan_pelanggan/delete/{id}', 'Pesanan_pelangganController@delete');
Route::post('pesanan_pelanggan/update', 'Pesanan_pelangganControllerController@update');

Route::resource('penjualan', 'PenjualanController');
Route::get('penjualan/delete/{id}', 'PenjualanController@delete');
Route::post('penjualan/update', 'PenjualanControllerController@update');

Route::resource('akun', 'AkunController');
Route::get('akun/delete/{id}', 'AkunController@delete');
Route::post('akun/update', 'AkunController@update');

Route::resource('salesInvoice', 'SalesInvoiceController');

Route::resource('salesOrder','SalesOrderController');
Route::post('salesOrder/store','SalesOrderController@store');
Route::get('salesOrder/delete/{id}', 'SalesOrderController@delete');

Route::get('addItem', 'SalesOrderController@addItem');
Route::post('storeItem', 'SalesOrderController@storeItem');

Route::resource('barang', 'BarangController');
Route::get('barang/delete/{id}', 'BarangController@delete');
Route::post('barang/update', 'BarangController@update');

Route::get('salesItem/delete/{id}', 'SalesItemController@delete');

Route::resource('akunLaba', 'AkunLabaController');
Route::get('akunLaba/delete/{id}', 'AkunLabaController@delete');
Route::post('akunLaba/update', 'AkunLabaController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
