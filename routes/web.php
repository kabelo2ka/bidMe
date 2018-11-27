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
    $products = \App\Product::all();
    return view('welcome', compact('products'));
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('product/{product}', 'ProductController@show')->name('product.show');

Route::post('bid/store', 'BidController@store')->name('bid.store');

Route::get('bid/not-me', function() {
    cookie()->queue(cookie()->forget('bidder_email'));
    return redirect()->back();
})->name('bid.not-me');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::resource('product', 'Admin\ProductController');

});