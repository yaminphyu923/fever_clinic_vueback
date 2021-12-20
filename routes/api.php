<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DegreeController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\SpecialityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('degrees',[DegreeController::class,'index']);

Route::post('createDegrees',[DegreeController::class,'store']);

Route::get('specialities',[SpecialityController::class,'index']);

Route::post('createSpecialities',[SpecialityController::class,'store']);

Route::get('doctors',[DoctorController::class,'index']);

Route::post('createDoctors',[DoctorController::class,'store']);