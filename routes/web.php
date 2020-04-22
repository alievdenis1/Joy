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


Auth::routes();
Route::get('/', 'PagesController@index')->name('home');
Route::get('/myproducts', 'ProductsController@myProducts')->name('account')->middleware('auth');
Route::post('{city}/products', 'ProductsController@viewsProducts')->name('Products');

Route::get('{city}/products/{id}', 'ProductsController@viewProduct')->name('Product');
Route::delete('{city}/products/{id}', 'ProductsController@deleteProduct')->name('deleteProduct');
Route::get('{city}/products/{id}/edit', 'ProductsController@editProduct')->name('editProduct');
Route::post('{city}/products/{id}/edit', 'ProductsController@putEditProduct')->name('putEditProduct');
Route::get('/addproduct', 'ProductsController@addProduct')->name('addProduct')->middleware('auth');
Route::post('/addproduct', 'ProductsController@postAddProduct')->name('postAddProduct')->middleware('auth');

Route::get('/searchProduct', 'ProductsController@viewSerchProducts')->name('searchProduct');
