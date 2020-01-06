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

Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');

Route::get('/gioi-thieu', 'Frontend\FrontendController@about')->name('frontend.about');

Route::get('/lien-he', 'Frontend\FrontendController@contact')->name('frontend.contact');

Route::post('/lien-he/goi-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');

Route::get('/san-pham', 'Frontend\FrontendController@product')->name('frontend.product');

Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

Route::get('/san-pham/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.productDetail');

Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');

Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');
Route::post('/dat-hang', 'Frontend\FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'Frontend\FrontendController@orderFinish')->name('frontend.orderFinish');
