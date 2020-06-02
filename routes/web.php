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

// Guest
Route::view('/prijava', 'login')->middleware('guest');
Route::view('/registracija', 'registration')->middleware('guest');
Route::get('/authenticate', 'Auth\LoginController@authenticate')->middleware('guest');
Route::post('/register', 'Auth\RegisterController@store')->middleware('guest');

// Guest, user
Route::view('/kosara', 'cart.index')->middleware('not.admin');
Route::post('/cart/store', 'CartsController@store')->middleware('not.admin');

// Guest, user, admin
Route::get('/', 'ItemsController@index');
Route::get('/artikli', 'ItemsController@index');
Route::view('/onama', 'about');
Route::view('/kontakt', 'contact');
Route::get('/artikli/search', 'ItemsController@search');
Route::get('/artikli/{item}', 'ItemsController@show');

// User, admin
Route::get('/profil', 'UsersController@myProfile')->middleware('not.guest');
Route::get('/odjava', 'Auth\LoginController@logout')->middleware('not.guest');
Route::put('/profil/{user}', 'UsersController@updateProfile')->middleware('not.guest');

// Admin
Route::post('/artikli/save', 'ItemsController@store')->middleware('admin');
Route::get('/artikli/{item}/uredi', 'ItemsController@edit')->middleware('admin');
Route::put('/artikli/{item}', 'ItemsController@update')->middleware('admin');
Route::delete('/artikli/{item}', 'ItemsController@destroy')->middleware('admin');

Route::get('/proizvodjaci', 'ManufacturersController@index')->middleware('admin');
Route::post('/proizvodjaci/save', 'ManufacturersController@store')->middleware('admin');
Route::put('/proizvodjaci/{manufacturer}', 'ManufacturersController@update')->middleware('admin');
Route::delete('/proizvodjaci/{manufacturer}', 'ManufacturersController@destroy')->middleware('admin');


Route::get('/korisnici', 'UsersController@index')->middleware('admin');
Route::put('/korisnici/{user}', 'UsersController@updateUser')->middleware('admin');
Route::post('/korisnici/store', 'UsersController@store')->middleware('admin');
Route::get('/korisnici/{user}', 'UsersController@show')->middleware('admin');

Route::delete('/slike/{item}', 'ImagesController@destroy')->middleware('admin');

Route::get('/kupovine', 'CartsController@index')->middleware('admin');
