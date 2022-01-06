<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LabController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\DegreeController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\ImagingController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\SpecialityController;
use App\Http\Controllers\Api\LabCategoryController;
use App\Http\Controllers\Api\MedicalListController;
use App\Http\Controllers\Api\HRManagementController;
use App\Http\Controllers\Api\RefillMedicalController;
use App\Http\Controllers\Api\OutMedicalListController;
use App\Http\Controllers\Api\MedicalCategoryController;
use App\Http\Controllers\Api\PrescriptiveMedicineController;

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

Route::get('degrees_paginate',[DegreeController::class,'degreePaginate']);

Route::post('createDegrees',[DegreeController::class,'store']);

Route::get('degrees/{id}',[DegreeController::class,'edit']);

Route::put('degrees/{id}',[DegreeController::class,'update']);

Route::delete('degrees/{id}',[DegreeController::class,'destroy']);

Route::get('specialities',[SpecialityController::class,'index']);

Route::get('specialities_paginate',[SpecialityController::class,'specialityPaginate']);

Route::get('specialities/{id}',[SpecialityController::class,'edit']);

Route::put('specialities/{id}',[SpecialityController::class,'update']);

Route::post('createSpecialities',[SpecialityController::class,'store']);

Route::delete('specialities/{id}',[SpecialityController::class,'destroy']);

Route::get('doctors',[DoctorController::class,'index']);

Route::get('doctors_paginate',[DoctorController::class,'doctorPaginate']);

Route::post('createDoctors',[DoctorController::class,'store']);

Route::get('doctors',[DoctorController::class,'index']);

Route::get('doctors/{id}',[DoctorController::class,'edit']);

Route::put('doctors/{id}',[DoctorController::class,'update']);

Route::delete('doctors/{id}',[DoctorController::class,'destroy']);

Route::apiResource('patients',PatientController::class);

Route::get('patients_paginate',[PatientController::class, 'patientPaginate']);

Route::apiResource('positions',PositionController::class);

Route::get('position_paginate',[PositionController::class,'positionPaginate']);

Route::get('/positions/edit/{id}',[PositionController::class,'edit']);

Route::apiResource('hrs',HRManagementController::class);

Route::get('hrs_paginate',[HRManagementController::class, 'hrPaginate']);

Route::apiResource('hospitals',HospitalController::class);

Route::apiResource('imagings',ImagingController::class);

Route::apiResource('treatments',TreatmentController::class);

Route::apiResource('medical_categories',MedicalCategoryController::class);

Route::get('medical_categories_paginate',[MedicalCategoryController::class, 'medicalCategoryPaginate']);

Route::apiResource('medical_lists',MedicalListController::class);

Route::get('medical_lists_paginate',[MedicalListController::class, 'medicalListPaginate']);

Route::apiResource('outmedical',OutMedicalListController::class);

Route::get('out_medical_paginate',[OutMedicalListController::class, 'outMedicalPaginate']);

Route::apiResource('refill',RefillMedicalController::class);

Route::get('refill_paginate',[RefillMedicalController::class, 'refillPaginate']);

Route::get('/patientData',[PatientController::class,'patientData']);

Route::get('/medicalCategoryData',[MedicalCategoryController::class,'medicalCategoryData']);

Route::get('/doctorData',[DoctorController::class,'doctorData']);

Route::get('/medicalListData',[MedicalListController::class,'medicalListData']);

Route::get('/groupData',[GroupController::class,'groupData']);

Route::get('/labCategoryData',[LabCategoryController::class,'labCategoryData']);

Route::apiResource('labs',LabController::class);

Route::get('labs_paginate',[LabController::class, 'labPaginate']);

Route::apiResource('lab_categories',LabCategoryController::class);

Route::get('lab_categories_paginate',[LabCategoryController::class, 'labCategoryPaginate']);

Route::apiResource('groups',GroupController::class);

Route::get('groups_paginate',[GroupController::class, 'groupPaginate']);

Route::apiResource('pre_medicines',PrescriptiveMedicineController::class);

Route::get('pre_medicines_paginate',[PrescriptiveMedicineController::class,'prescriptiveMedicinePaginate']);

Route::apiResource('diseases',DiseaseController::class);

Route::get('diseases_paginate',[DiseaseController::class, 'diseasePaginate']);

Route::get('/diseaseData',[DiseaseController::class,'diseaseData']);

