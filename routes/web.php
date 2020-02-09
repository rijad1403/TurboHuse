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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/onama', function () {
    return view('about');
});

Route::get('/kontakt', function () {
    return view('contact');
});

Route::get('/kosara', function () {
    return view('cart.index');
});

Route::get('/artikli', 'ItemsController@index');
ROute::get('/artikli/{item}', 'ItemsController@show');


// Guest

Route::view('/kosara', 'cart.index');


// Admin

// Admin - Items

Route::get('/admin/artikli', 'ItemsController@index');
Route::post('/admin/artikli/save', 'ItemsController@store');
Route::get('/admin/artikli/search', 'ItemsController@search');
Route::get('/admin/artikli/{item}', 'ItemsController@edit');
Route::put('/admin/artikli/{item}', 'ItemsController@update');
Route::delete('/admin/artikli/{item}', 'ItemsController@destroy');

// Admin - Manufacturers
Route::post('/admin/proizvodjaci/save', 'ManufacturersController@store');

// Admin - Users
Route::get('admin/korisnici', 'UsersController@index');
Route::get('/admin/test', 'UsersController@test');
Route::get('/admin/artikli', 'ItemsController@index');
