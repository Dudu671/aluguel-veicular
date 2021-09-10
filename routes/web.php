<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentController;

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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/renteds', [VehicleController::class, 'renteds'])->name('vehicles.renteds');
Route::get('/vehicles/newForm', [VehicleController::class, 'newForm']);
Route::post('/vehicles/new', [VehicleController::class, 'new'])->name('vehicles.new');
Route::get('/vehicles/edit/{id}', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::post('/rents/new', [RentController::class, 'newRent'])->name('rents.new');
Route::delete('/rents/{id}', [RentController::class, 'destroy'])->name('rents.destroy');
