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

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/faq', 'PageController@faq')->name('page.faq');
Route::get('/blog', 'PageController@blog')->name('page.blog');
Route::post('contact', 'ContactController@store');

Route::get('/', 'PageController@homepage')->name('page.homepage');
Route::get('/contact', 'PageController@contact')->name('page.contact');
Route::get('/price', 'PageController@price')->name('page.price');
Route::get('/policy', 'PageController@policy')->name('page.policy');

Route::post('/upload', 'FileEntriesController@index')->name('upload_index');

// Checkout
Route::get('/roomview', 'CheckoutController@roomview')->name('checkout.roomview');
Route::get('/options', 'CheckoutController@options')->name('checkout.options');
Route::get('/session', 'CheckoutController@session')->name('checkout.session');

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
