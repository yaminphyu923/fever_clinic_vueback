<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('layouts/home');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/patient-create', [HomeController::class, 'patientCreate']);

Route::get('/doctors', [HomeController::class, 'doctor']);

Route::get('/specialities', [HomeController::class, 'speciality']);

Route::get('/degrees', [HomeController::class, 'degree']);

