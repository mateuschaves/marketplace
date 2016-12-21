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
    return redirect()->route('products');
});

Auth::routes();

Route::get('/home', function(){
    return redirect()->route('products');
});

Route::get('/clients', 'UsersController@index')->name('clients')->middleware('admin');

Route::get('/show/client/{id}', 'UsersController@show')->middleware('admin');

Route::get('/register-product/', 'ProductController@create')->middleware('admin');

Route::post('/register-product/', 'ProductController@store')->name('product.store')->middleware('admin');

Route::get('/products', 'ProductController@index')->name('products');

Route::get('order/product/{id}', 'OrderController@create');

Route::post('order/product/{id}', 'OrderController@store');

Route::get('acesso-negado', function(){

        return view('errors.acessonegado');

})->name('acesso-negado');

Route::get('/products/list', 'ProductController@productList')->name('product.list')->middleware('admin');

Route::get('product/delete/{id}', 'ProductController@destroy');

Route::get('productImage/{filename}', 'ProductController@getImageProduct')->name('product.image');

Route::post('order/{id}', 'OrderController@store')->name('order');

Route::get('show/order/{id}', 'OrderController@show');

Route::get('orders', 'OrderController@index')->middleware('admin');

Route::get('orders/delivered/{id}', 'OrderController@update')->name('order.delivered')->middleware('admin');

Route::get('edit/product/{id}', 'ProductController@show')->name('product.edit')->middleware('admin');

Route::post('edit/product/{id}', 'ProductController@update')->name('product.edit.store')->middleware('admin');

Route::post('serch', 'ProductController@index')->name('search');
