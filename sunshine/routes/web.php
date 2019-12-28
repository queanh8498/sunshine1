<?php

Route::get('/hello', 'ExampleController@hello')->name('example.hello');
Route::get('/gioithieu', 'GioiThieuController@gioithieu')->name('example.gioithieu');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gioi-thieu', function () {
    return "Hello <h1>Hello Minh </h1>Minh";
});

Route::get('/lien-he', function () {
    return "Contact us";
});

Route::post('/gioi-thieu', function () {
    return "Hello <h1>Hello</h1>";
});

// route Danh mục Sản phẩm

Route::get('/admin/danhsachsanpham/excel', 'SanPhamController@excel')->name('danhsachsanpham.excel');
    //in sp 
Route::get('/admin/danhsachsanpham/print', 'SanPhamController@print')->name('danhsachsanpham.print');

Route::resource('/admin/danhsachsanpham', 'SanPhamController');

// route Danh mục LOẠI

Route::get('/admin/danhsachloai/excel', 'LoaiController@excel')->name('danhsachloai.excel');
Route::get('/admin/danhsachloai/print', 'LoaiController@print')->name('danhsachloai.print');

Route::resource('/admin/danhsachloai', 'LoaiController');

// route Danh mục CHỦ ĐỀ

Route::resource('/admin/danhsachchude', 'ChuDeController');


//Route::get('/admin/danhsachsanpham/edit/{id}', 'SanPhamController@edit')->name('backend.sanpham.edit');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/admin/activate/{nv_ma}', 'Backend\BackendController@activate')->name('activate');

