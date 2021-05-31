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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', 'App\Http\Controllers\RequestController@index');
Route::get('/requests', 'App\Http\Controllers\RequestController@index')->name('list_requests');
Route::group(['prefix' => 'requests'], function () {
    Route::get('/drafts', 'App\Http\Controllers\RequestController@drafts')
        ->name('list_drafts')
        ->middleware('auth');

    Route::get('/show/{id}', 'App\Http\Controllers\RequestController@show')
        ->name('show_request');

    Route::get('/create', 'App\Http\Controllers\RequestController@create')
        ->name('create_request')
        ->middleware('can:request.create');

    Route::post('/create', 'App\Http\Controllers\RequestController@store')
        ->name('store_request')
        ->middleware('can:request.create');
        Route::get('/delete/{rq}', 'App\Http\Controllers\RequestController@destroy')
        ->name('delete_request')
        ->middleware('can:request.delete,rq');

    Route::get('/edit/{rq}', 'App\Http\Controllers\RequestController@edit')
        ->name('edit_request')
        ->middleware('can:request.update,rq');

    Route::post('/edit/{rq}', 'App\Http\Controllers\RequestController@update')
        ->name('update_request')
        ->middleware('can:request.update,rq');

    Route::get('/accept/{rq}', 'App\Http\Controllers\RequestController@accept')
        ->name('accept_request')
        ->middleware('can:request.accept');
});