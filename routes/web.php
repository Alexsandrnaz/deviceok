<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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
Route::group([

'prefix'=>'admin'
],function(){


    Route::group(['middleware'=>'adminRight'],function(){
        Route::get('/','App\Http\Controllers\MainController@adminpanel')->name('adminpanel')->middleware('auth');
        Route::get('/userorders','App\Http\Controllers\MainController@userorders')->name('userorders')->middleware('auth');
        Route::get('/userordersall','App\Http\Controllers\MainController@userordersAll')->name('userordersAll')->middleware('auth');
        Route::get('/ordersDiclined','App\Http\Controllers\MainController@ordersDiclined')->name('ordersDiclined')->middleware('auth');
        Route::get('/ordersAccepted','App\Http\Controllers\MainController@ordersAccepted')->name('ordersAccepted')->middleware('auth');
        Route::get('/ordersInShop','App\Http\Controllers\MainController@ordersInShop')->name('ordersInShop')->middleware('auth');
        Route::get('/ordersInPending','App\Http\Controllers\MainController@ordersInPending')->name('ordersInPending')->middleware('auth');
        Route::post('/userorder/confirm/{id}','App\Http\Controllers\MainController@userordersConfirm')->name('userordersconfirm')->middleware('auth');
        Route::post('/userorder/decline/{id}','App\Http\Controllers\MainController@userordersDicline')->name('userordersdecline')->middleware('auth');
        Route::post('/userorder/inshop/{id}','App\Http\Controllers\MainController@userordersInshop')->name('userordersinshop')->middleware('auth');
        Route::post('/userorder/acceted/{id}','App\Http\Controllers\MainController@userordersAcceted')->name('userordersacceted')->middleware('auth');
        Route::post('/userorder/search','App\Http\Controllers\MainController@userordersSearch')->name('userorderssearch')->middleware('auth');
        
        Route::get('/admin/producteditor', 'App\Http\Controllers\ProductCategoryEditor\ProductController@index')->name('editor-product-index')->middleware('auth');
        Route::get('/admin/categoryeditor', 'App\Http\Controllers\ProductCategoryEditor\CategoryController@index')->name('editor-category-index')->middleware('auth');
        Route::resource('partners','App\Http\Controllers\PartnerController');
        Route::resource('advertising','App\Http\Controllers\AdvertisingController');
        Route::resource('categories','App\Http\Controllers\ProductCategoryEditor\CategoryController');
        Route::resource('products','App\Http\Controllers\ProductCategoryEditor\ProductController');
        });
});




Route::get('/personalpage','App\Http\Controllers\MainController@personalpage')->name('personalpage')->middleware('auth');
Route::get('/logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/home','App\Http\Controllers\Auth\HomeController@home')->name('home');

Route::get('/basket','App\Http\Controllers\ShoppingController@basket')->name('basket');
Route::get('/basket/confirm','App\Http\Controllers\ShoppingController@basketOrder')->name('confirm-order');
Route::post('/basket/ConfirmedOrder','App\Http\Controllers\ShoppingController@basketConfirmedOrder')->name('finish-order');
Route::post('/basket/add/{id}','App\Http\Controllers\ShoppingController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}','App\Http\Controllers\ShoppingController@basketRemove')->name('basket-remove');
Route::get('/inspect/{id}','App\Http\Controllers\ShoppingController@inspect')->name('inspect')->middleware('auth');

Route::post('/home','App\Http\Controllers\MainController@home')->name('home');
Route::get('/','App\Http\Controllers\MainController@home')->name('index');
Route::get('/about','App\Http\Controllers\MainController@about')->name('about');
Route::post('/review/comment','App\Http\Controllers\MainController@reviewcomment')->name('reviewcomment');
Route::get('/review','App\Http\Controllers\MainController@review')->name('review');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}','App\Http\Controllers\MainController@product')->name('product'); 








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
