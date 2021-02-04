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

Route::middleware(['belum_login'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('/');
    Route::post('aksilogin', 'DashboardController@loginAdmin')->name('aksilogin');
    Route::get('register', 'DashboardController@register')->name('register');
    Route::post('aksiregister', 'DashboardController@registerAdmin')->name('aksiregister');
});

Route::middleware(['sudah_login'])->group(function () {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('tabel', 'DashboardController@tabel')->name('tabel');
    Route::get('logout', 'DashboardController@logout')->name('logout');

    // admin
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('admin/create', 'AdminController@create')->name('admin.create');
    Route::post('admin', 'AdminController@store')->name('admin.store');
    Route::get('admin/{admin}', 'AdminController@edit')->name('admin.edit');
    Route::put('admin/{admin}', 'AdminController@update')->name('admin.update');
    Route::delete('admin/{admin}', 'AdminController@destroy')->name('admin.delete');

    // brand
    Route::get('brands', 'BrandController@index')->name('brands');
    Route::get('brands/create', 'BrandController@create')->name('brands.create');
    Route::post('brands', 'BrandController@store')->name('brands.store');
    Route::get('brands/{brand}', 'BrandController@edit')->name('brands.edit');
    Route::put('brands/{brand}', 'BrandController@update')->name('brands.update');
    Route::delete('brands/{brand}', 'BrandController@destroy')->name('brands.delete');

    // slider
    Route::get('sliders', 'SliderController@index')->name('sliders');
    Route::get('sliders/create', 'SliderController@create')->name('sliders.create');
    Route::post('sliders', 'SliderController@store')->name('sliders.store');
    Route::get('sliders/{slider}', 'SliderController@edit')->name('sliders.edit');
    Route::put('sliders/{slider}', 'SliderController@update')->name('sliders.update');
    Route::delete('sliders/{slider}', 'SliderController@destroy')->name('sliders.delete');

    // categories
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('categories', 'CategoryController@store')->name('categories.store');
    Route::get('categories/{category}', 'CategoryController@edit')->name('categories.edit');
    Route::put('categories/{category}', 'CategoryController@update')->name('categories.update');
    Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.delete');

    // blogs
    Route::get('blogs', 'BlogController@index')->name('blogs');
    Route::get('blogs/create', 'BlogController@create')->name('blogs.create');
    Route::post('blogs', 'BlogController@store')->name('blogs.store');
    Route::get('blogs/{blog}', 'BlogController@edit')->name('blogs.edit');
    Route::put('blogs/{blog}', 'BlogController@update')->name('blogs.update');
    Route::delete('blogs/{blog}', 'BlogController@destroy')->name('blogs.delete');

    Route::get('blogs/comment/{blog}', 'BlogController@comment')->name('blogs.comment');
    Route::delete('comments/{comment}', 'BlogController@destroy_comment')->name('comments.delete');

    // product
    Route::get('products', 'ProductController@index')->name('products');
    Route::get('products/create', 'ProductController@create')->name('products.create');
    Route::post('products', 'ProductController@store')->name('products.store');
    Route::get('products/{product}', 'ProductController@edit')->name('products.edit');
    Route::put('products/{product}', 'ProductController@update')->name('products.update');
    Route::delete('products/{product}', 'ProductController@destroy')->name('products.delete');
    
    Route::get('products/foto/{product}', 'ProductController@foto')->name('products.foto');
    Route::get('product_photos/create_foto/{product}', 'ProductController@create_foto')->name('product_photos.create');
    Route::post('product_photos', 'ProductController@store_foto')->name('product_photos.store');
    Route::get('product_photos/{product_photo}', 'ProductController@edit_foto')->name('product_photos.edit');
    Route::put('product_photos/{product_photo}', 'ProductController@update_foto')->name('product_photos.update');
    Route::delete('product_photos/{product_photo}', 'ProductController@destroy_foto')->name('product_photos.delete');

    // regions
    Route::get('regions', 'RegionController@index')->name('regions');
    Route::get('regions/create', 'RegionController@create')->name('regions.create');
    Route::post('regions', 'RegionController@store')->name('regions.store');
    Route::get('regions/{region}', 'RegionController@edit')->name('regions.edit');
    Route::put('regions/{region}', 'RegionController@update')->name('regions.update');
    Route::delete('regions/{region}', 'RegionController@destroy')->name('regions.delete');

    Route::get('regions/detail/{region}', 'RegionController@region_detail')->name('regions.detail');
    Route::get('region_details/create_detail/{region}', 'RegionController@create_detail')->name('region_details.create');
    Route::post('region_details', 'RegionController@store_detail')->name('region_details.store');
    Route::get('region_details/{region_detail}', 'RegionController@edit_detail')->name('region_details.edit');
    Route::put('region_details/{region_detail}', 'RegionController@update_detail')->name('region_details.update');
    Route::delete('region_details/{region_detail}', 'RegionController@destroy_detail')->name('region_details.delete');

    // mitra kerja
    Route::get('mitra', 'TestimoniController@index')->name('mitra');
    Route::get('mitra/create', 'TestimoniController@create')->name('mitra.create');
    Route::post('mitra', 'TestimoniController@store')->name('mitra.store');
    Route::get('mitra/{testimoni}', 'TestimoniController@edit')->name('mitra.edit');
    Route::put('mitra/{testimoni}', 'TestimoniController@update')->name('mitra.update');
    Route::delete('mitra/{testimoni}', 'TestimoniController@destroy')->name('mitra.delete');

    // testimonial
    Route::get('testimonials', 'TestimonialController@index')->name('testimonials');
    Route::get('testimonials/create', 'TestimonialController@create')->name('testimonials.create');
    Route::post('testimonials', 'TestimonialController@store')->name('testimonials.store');
    Route::get('testimonials/create', 'TestimonialController@create')->name('testimonials.create');
    Route::get('testimonials/{testimonial}', 'TestimonialController@edit')->name('testimonials.edit');
    Route::put('testimonials/{testimonial}', 'TestimonialController@update')->name('testimonials.update');
    Route::delete('testimonials/{testimonial}', 'TestimonialController@destroy')->name('testimonials.delete');
    
    Route::get('testimonials/kecamatan/{id}', 'TestimonialController@kecamatan')->name('testimonials.kecamatan');

    // custom
    Route::get('customs', 'CustomController@index')->name('customs');
    Route::get('customs/create', 'CustomController@create')->name('customs.create');
    Route::post('customs', 'CustomController@store')->name('customs.store');
    Route::get('customs/{custom}', 'CustomController@edit')->name('customs.edit');
    Route::put('customs/{custom}', 'CustomController@update')->name('customs.update');
    Route::delete('customs/{custom}', 'CustomController@destroy')->name('customs.delete');

    // sparepart
    Route::get('spareparts', 'SparepartController@index')->name('spareparts');
    Route::get('spareparts/create', 'SparepartController@create')->name('spareparts.create');
    Route::post('spareparts', 'SparepartController@store')->name('spareparts.store');
    Route::get('spareparts/{sparepart}', 'SparepartController@edit')->name('spareparts.edit');
    Route::put('spareparts/{sparepart}', 'SparepartController@update')->name('spareparts.update');
    Route::delete('spareparts/{sparepart}', 'SparepartController@destroy')->name('spareparts.delete');

    // promos
    Route::get('promos', 'PromoController@index')->name('promos');
    Route::get('promos/create', 'PromoController@create')->name('promos.create');
    Route::post('promos', 'PromoController@store')->name('promos.store');
    Route::get('promos/{promo}', 'PromoController@edit')->name('promos.edit');
    Route::put('promos/{promo}', 'PromoController@update')->name('promos.update');
    Route::delete('promos/{promo}', 'PromoController@destroy')->name('promos.delete');

    // legalitas
    Route::get('legalitas', 'LegalitasController@index')->name('legalitas');
    Route::get('legalitas/create', 'LegalitasController@create')->name('legalitas.create');
    Route::post('legalitas', 'LegalitasController@store')->name('legalitas.store');
    Route::get('legalitas/{legalitas}', 'LegalitasController@edit')->name('legalitas.edit');
    Route::put('legalitas/{legalitas}', 'LegalitasController@update')->name('legalitas.update');
    Route::delete('legalitas/{legalitas}', 'LegalitasController@destroy')->name('legalitas.delete');

});
