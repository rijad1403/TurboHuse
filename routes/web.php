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
Route::view('/prijava', 'login');
Route::view('/registracija', 'registration');
Route::get('/authenticate', 'Auth\LoginController@authenticate');

// Guest, user, admin
Route::get('/', 'ItemsController@index');
Route::get('/artikli', 'ItemsController@index');
Route::view('/onama', 'about');
Route::view('/kontakt', 'contact');
Route::view('/kosara', 'cart.index');
Route::get('/artikli/search', 'ItemsController@search');
Route::get('/artikli/{item}', 'ItemsController@show');

// User, admin
Route::get('/profil', 'UsersController@myProfile');
Route::get('/odjava', 'Auth\LoginController@logout');

// Admin
Route::get('/artikli', 'ItemsController@index');
Route::post('/artikli/save', 'ItemsController@store');
Route::get('/artikli/{item}/uredi', 'ItemsController@edit');
Route::put('/artikli/{item}', 'ItemsController@update');
Route::delete('/artikli/{item}', 'ItemsController@destroy');
Route::post('/manufacturers/save', 'ManufacturersController@store');
Route::get('/korisnici', 'UsersController@index');
