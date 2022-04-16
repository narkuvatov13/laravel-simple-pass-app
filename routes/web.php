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

/*Route::get('/', function () {
    return view('auth.login');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
Route::get('/edit/{site_id}/',[App\Http\Controllers\HomeController::class,'edit'])->name('home.edit');
Route::patch('/update/{site}/',[App\Http\Controllers\HomeController::class,'update'])->name('home.update');
Route::delete('/destroy/{site_id}/',[App\Http\Controllers\HomeController::class,'destroy'])->name('home.destroy');
