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
// LOGIN & REGISTER
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

/*
/* -------------------------------- FRONT END ------------------------------- */
Route::get('/', 'HomeController@index');
// Route::get('login', 'BackendController@login');


/* -------------------------------- BACK END -------------------------------- */
// ADMIN
Route::group([
    'prefix' => 'backend',
    'middleware' => 'auth'
], function () {

    // Blank page
    Route::get('blank', 'BackendController@blank');

    //routing resource product
    Route::resource('products', 'ProductController');
    Route::resource('dashboard', 'BackendController');

});

// USER
Route::group([
    'prefix' => 'backend'
], function () {
    Route::get('reports', 'BackendController@reports');
    Route::get('users', 'BackendController@users');
    Route::get('settings', 'BackendController@settings');
});
