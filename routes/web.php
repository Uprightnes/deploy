<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\editController;
use App\Http\Controllers\deleteController;
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


Route::get('deploy', [App\Http\Controllers\deployController::class, 'index']);

Route::put('edit/{staffId}', [editController::class, 'edit']);

Route::delete('/delete/{staffId}', [deleteController::class, 'delete']);

Route::post('/sendmail/{staffId}', [sendmailController::class, 'sendmail']);



