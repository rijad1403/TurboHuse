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
Route::get('/items/create', 'ItemsController@create');
Route::post('/items/store', 'ItemsController@store');
ROute::get('/items/{item}', 'ItemsController@show');


// Admin

Route::get('/admin', 'UsersController@myProfile');
Route::get('admin/korisnici', 'UsersController@index');
Route::get('/admin/artikli', 'ItemsController@index');
