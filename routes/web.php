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

use App\Http\Controllers\ItemsController;
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

Route::get('/kosarica', function () {
    return view('cart');
});

Route::get('/artikli', 'ItemsController@index');
ROute::get('/artikli/{item}', 'ItemsController@show');


// Admin

// Items

Route::get('/admin/artikli', 'ItemsController@index');
Route::post('/admin/artikli/save', 'ItemsController@store');
Route::get('/admin/artikli/search', 'ItemsController@search');
Route::get('/admin/artikli/{item}', 'ItemsController@edit');
Route::put('/admin/artikli/{item}', 'ItemsController@update');
Route::delete('/admin/artikli/{item}', 'ItemsController@destroy');

// Manufacturers
Route::post('/admin/proizvodjaci/save', 'ManufacturersController@store');


Route::get('admin/korisnici', 'UsersController@index');
Route::get('/admin/test', 'UsersController@test');
Route::get('/admin/artikli', 'ItemsController@index');
