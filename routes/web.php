<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::namespace('App\Http\Controllers')->group(function() {
    // TODO: Add views, etc.
    Route::resource('foodItems', 'FoodItemController');


    Route::resource('users', 'UserController');
    //TODO: Figure out what we need to do to keep this a resource route with named routes... Maybe this is fine?
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', 'UserController@index')->name('manageUsers');
        Route::get('create', 'UserController@create')->name('createUser');
        Route::post('store', 'UserController@store')->name('storeUser');
        Route::get('edit', 'UserController@edit')->name('editUser');
        Route::put('update', 'UserController@update')->name('updateUser');
    });

});


require __DIR__.'/auth.php';
