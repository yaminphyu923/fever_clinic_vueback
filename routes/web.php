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

Route::get('/hospital-create', [HomeController::class, 'hospitalCreate']);

Route::get('/treatment-create', [HomeController::class, 'treatmentCreate']);

Route::get('/imaging-create', [HomeController::class, 'imagingCreate']);

Route::get('/doctors', [HomeController::class, 'doctor']);

Route::get('/doctors/{id}', [HomeController::class, 'editDoctor']);

Route::get('/specialities', [HomeController::class, 'speciality']);

Route::get('/specialities/{id}', [HomeController::class, 'editSpeciality']);

Route::get('/degrees', [HomeController::class, 'degree']);

Route::get('/degrees/{id}', [HomeController::class, 'editDegree']);

Route::get('/hrmanagements', [HomeController::class, 'hrmanagement']);

Route::get('/hrmanagements/{id}', [HomeController::class, 'edithrmanagement']);

Route::get('/positions', [HomeController::class, 'position']);

Route::get('/positions/{id}', [HomeController::class, 'editPosition']);

Route::get('/medical', [HomeController::class, 'medicalList']);

Route::get('/detail_medical/{id}', [HomeController::class, 'detailMedicalList']);

Route::get('/medical/category', [HomeController::class, 'medicalCategory']);

Route::get('/medical/category/{id}', [HomeController::class, 'editMedicalCategory']);

Route::get('/lab', [HomeController::class, 'lab']);

Route::get('/lab_category', [HomeController::class, 'labCategory']);

Route::get('/group', [HomeController::class, 'group']);

Route::get('/group/{id}', [HomeController::class, 'editGroup']);

Route::get('/lab_category/{id}', [HomeController::class, 'editLabCategory']);

