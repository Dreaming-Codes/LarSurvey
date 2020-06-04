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
if (file_exists('../resources/views/setup.blade.php')){
    Route::get('/', function () {
        return view('setup');
    });
    Route::post('/', function () {
        return view('setup');
    });

} else {
    Route::get('/', function () {
        return view('welcome');
    });
};
