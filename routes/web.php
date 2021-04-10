<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration', function () {
    return view('Registration');
});
Route::get('/auth', function () {
    return view('Auth');
});
Route::post('/registration',
            'App\Http\Controllers\AuthController@Registration')->name('resumeStore');
Route::get('/auth/login','App\Http\Controllers\AuthController@Auth')->name('resumeAuth');
<<<<<<< HEAD
Route::get('/left','App\Http\Controllers\AuthController@Views');
=======

Route::get('/resume', function () {
    return view('resume');
});
>>>>>>> ca10fa30328c482390fc73316c1fc6502fca3f5b
