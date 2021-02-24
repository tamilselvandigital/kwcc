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


// Set route URL for Main dashboard page
Route::get('/dashboard', 'Dashboard@index');
// Set route URL for Tasks page
Route::get('/task', 'Task@index');
// Set route URL for History page
Route::get('/history', 'History@index');