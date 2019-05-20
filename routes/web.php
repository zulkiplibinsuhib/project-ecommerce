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

// first
Auth::routes();
// after
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

// Route Admin Products
Route::name('admin.')->group(function(){
  Route::group(['prefix'=>'admin'], function(){
    Route::resource('products', 'Admin\ProductController');
    Route::get('/products/image/{imageName}', 'Admin\ProductController@image')->name('product.image');

    Route::resource('orders', 'Admin\OrderController');
  });
});

// Route Just a Products
Route::get('/products','ProductController@index')->name('products.index');
Route::get('/products/{id}','ProductController@show')->name('products.show');
Route::post('/products/{id}', 'ProductController@store')->name('products.store');
Route::get('/products/image/{imageName}','ProductController@image')->name('products.image');

// Route Images
Route::prefix('image')->group(function(){
  Route::get('/', 'ImageController@index')->name('image.index');
  Route::get('/insert', 'ImageController@create')->name('image_insert');
  Route::post('/save', 'ImageController@store')->name('image_save');
  Route::get('/view/{fileImage}', 'ImageController@viewImage')->name('image_view');
});

// Route carts
Route::prefix('carts')->group(function(){
  Route::get('/', 'CartController@index')->name('carts.index');
  Route::get('/add/{id}', 'CartController@add')->name('carts.add');
  Route::patch('/update', 'CartController@update')->name('carts.update');
  Route::delete('/remove', 'CartController@remove')->name('carts.remove');
});

// Route publics
Route::prefix('public')->group(function(){
  Route::get('/', 'PublicController@index')->name('public.products.index');
  Route::get('/show/{id}', 'PublicController@show')->name('public.products.show');
});
