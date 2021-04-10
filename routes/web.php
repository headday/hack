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

Route::get('/','App\Http\Controllers\AuthController@Index');
Route::get('/registration', function () {
    return view('Registration');
});
Route::get('/auth', function () {
    return view('Auth');
});
Route::post('/registration',
            'App\Http\Controllers\AuthController@Registration')->name('resumeStore');
Route::get('/auth/login','App\Http\Controllers\AuthController@Auth')->name('resumeAuth');

Route::get('/resume','App\Http\Controllers\ResumeController@GetAllResume');

Route::get('/resume/{id}','App\Http\Controllers\ResumeController@GetResumeWithId');


Route::get('/form-resume', function () {
    return view('add-resume');
});
