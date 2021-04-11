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
Route::get('/lk','App\Http\Controllers\AuthController@Exit');

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

Route::post('/resume','App\Http\Controllers\ResumeController@addMessage')->name('addMessage');

Route::get('/my-resumes','App\Http\Controllers\ResumeController@showMyResume');

Route::post('/favirite/add','App\Http\Controllers\ResumeController@postHeartResume')->name('addFavorite');


Route::get('/form-resume', function () {
    return view('add-resume');
});


Route::post('/form-resume',
            'App\Http\Controllers\ResumeController@addResume')->name('addResume');

Route::post('/form-resume','App\Http\Controllers\ResumeController@addResume')->name('addResume');

Route::get('/show-message','App\Http\Controllers\ResumeController@showMessage');


Route::get('/favorites-resumes','App\Http\Controllers\ResumeController@showFavoritesResumes');


Route::get('/favorites-resumes','App\Http\Controllers\ResumeController@showLinkFavorites');


