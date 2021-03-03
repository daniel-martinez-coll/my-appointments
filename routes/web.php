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

Route::middleware(['auth', 'admin'])->group(function () {
    
	//specialty
	Route::get('/specialties', [App\Http\Controllers\Admin\SpecialtyController::class, 'index']);
	Route::get('/specialties/create', [App\Http\Controllers\Admin\SpecialtyController::class, 'create']);
	Route::get('/specialties/{id}/edit', [App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);
	Route::post('/specialties', [App\Http\Controllers\Admin\SpecialtyController::class, 'store']);
	Route::put('/specialties/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'update']);
	Route::delete('/specialties/{id}', [App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);

	//doctor
	Route::resource('/doctors', App\Http\Controllers\Admin\DoctorController::class);


	//pacientes
	Route::resource('/patients', App\Http\Controllers\Admin\PatientController::class);

});

Route::middleware(['auth', 'doctor'])->group(function () {

 	Route::get('/schedule', [App\Http\Controllers\Doctor\ScheduleController::class, 'edit']);
 	Route::post('/schedule', [App\Http\Controllers\Doctor\ScheduleController::class, 'store']);

});
