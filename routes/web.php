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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//specialty
Route::get('/specialties', [App\Http\Controllers\SpecialtyController::class, 'index']);
Route::get('/specialties/create', [App\Http\Controllers\SpecialtyController::class, 'create']);
Route::get('/specialties/{id}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);

Route::post('/specialties', [App\Http\Controllers\SpecialtyController::class, 'store']);
Route::put('/specialties/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);
Route::delete('/specialties/{id}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);