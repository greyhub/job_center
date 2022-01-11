<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'locale'], function() {
    Route::get('lang/{lang}', 'LangController@changeLang')->name('lang');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('/city/{slug}', 'HomeController@city')->name('city');
    Route::get('/job/{slug}', 'JobController@show')->name('job-show');
    Route::get('/job', 'JobController@show_list')->name('job-index');
    Route::get('/search/', 'JobController@search')->name('search');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/user', 'HomeController@user');
    Auth::routes();

    Route::get('/admin', 'Admin\HomeController@index')->name('
        admin');

    Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => 'check.admin',
    ], function () {
        Route::get('/', 'HomeController@index')->name('admin');
        Route::get('/user/{name}', 'UserController@index')->name('admin.index');
        Route::patch('/user/edit/{id}', 'UserController@editAdmin')->name('admin.edit');
        Route::delete('/user/{id}', 'UserController@destroy')->name('user.delete');
        Route::patch('/job/{id}/show', 'JobController@show')->name('admin.job.show');
        Route::patch('/job/{id}/hidden', 'JobController@hidden')->name('admin.job.hidden');
        Route::get('/job', 'JobController@index')->name('admin.job');
        Route::delete('/job/{id}', 'JobController@destroy')->name('admin.job.destroy');
    });

    Route::group([
    'namespace' => 'Admin',
    'prefix' => 'users',
    'middleware' => 'auth',
    ], function () {
        Route::get('/profile', 'UserController@edit')->name('user.profile');
        Route::post('/thaydoi', 'UserController@update')->name('user.update');
    //Route::post('/register', 'RegisterController@create')->name('register');
    });
});


