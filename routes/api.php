<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LabController;
use App\Http\Controllers\Api\DeadController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\DegreeController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\ImagingController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\DiagnosisController;
use App\Http\Controllers\Api\DischargeController;
use App\Http\Controllers\Api\PtOverallController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\MonitoringController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\SpecialityController;
use App\Http\Controllers\Api\LabCategoryController;
use App\Http\Controllers\Api\MedicalListController;
use App\Http\Controllers\Api\PastMedicalController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\HRManagementController;
use App\Http\Controllers\Api\ProgressNoteController;
use App\Http\Controllers\Api\InvestigationController;
use App\Http\Controllers\Api\RefillMedicalController;
use App\Http\Controllers\Api\OutMedicalListController;
use App\Http\Controllers\Api\PhyExaminationController;
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

Route::get('get_auth_user/{auth_id}',[UserController::class,'getAuth']);

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

Route::apiResource('past_medicals',PastMedicalController::class);

Route::apiResource('phy_examinations',PhyExaminationController::class);

Route::apiResource('diagnoses',DiagnosisController::class);

Route::apiResource('imagings',ImagingController::class);

Route::apiResource('treatments',TreatmentController::class);

Route::post('treatment-update',[TreatmentController::class,'treatmentUpdate']);

Route::post('ptoverall-update',[PtOverallController::class,'ptOverallUpdate']);

Route::post('investigation-update',[InvestigationController::class,'investigationUpdate']);

Route::apiResource('investigations',InvestigationController::class);

Route::apiResource('deads',DeadController::class);

Route::apiResource('discharges',DischargeController::class);

Route::apiResource('progresses',ProgressNoteController::class);

Route::post('progress-update',[ProgressNoteController::class,'progressUpdate']);

Route::apiResource('pt_overalls',PtOverallController::class);

Route::apiResource('monitorings',MonitoringController::class);

Route::apiResource('consultations',ConsultationController::class);

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

Route::get('labs_group',[LabController::class, 'labGroup']);

Route::get('labs_sortName',[LabController::class, 'sortByName']);

Route::apiResource('lab_categories',LabCategoryController::class);

Route::get('lab_categories_paginate',[LabCategoryController::class, 'labCategoryPaginate']);

Route::apiResource('groups',GroupController::class);

Route::get('groups_paginate',[GroupController::class, 'groupPaginate']);

Route::apiResource('pre_medicines',PrescriptiveMedicineController::class);

Route::get('pre_medicines_paginate',[PrescriptiveMedicineController::class,'prescriptiveMedicinePaginate']);

Route::apiResource('diseases',DiseaseController::class);

Route::get('diseases_paginate',[DiseaseController::class, 'diseasePaginate']);

Route::get('/diseaseData',[DiseaseController::class,'diseaseData']);

Route::get('/users',[LoginController::class,'index']);

Route::get('/edit_history',[PatientController::class,'editHistory']);

Route::apiResource('users',UserController::class);

Route::get('/newly',[UserController::class, 'newly']);

Route::put('/newlyUpdate/{id}',[UserController::class, 'newlyUpdate']);

Route::get('inPatientPaginate',[PatientController::class,'inPatientPaginate']);

Route::get('outPatientPaginate',[PatientController::class,'outPatientPaginate']);

Route::get('deadPatientPaginate',[PatientController::class,'deadPatientPaginate']);

Route::get('comoPatientPaginate',[PatientController::class,'comoPatientPaginate']);

Route::get('referralPatientPaginate',[PatientController::class,'referralPatientPaginate']);

Route::put('homeDeadStore/{id}',[PatientController::class,'homeDeadStore']);

Route::put('homeOutStore/{id}',[PatientController::class,'homeOutStore']);

Route::apiResource('permissions',PermissionController::class);

Route::get('/permissionPaginate',[PermissionController::class, 'permissionPaginate']);

Route::apiResource('roles',RoleController::class);

Route::get('rolePaginate',[RoleController::class,'rolePaginate']);

Route::get('roleData',[RoleController::class,'roleData']);

Route::get('detailPatientHospital/{patient_id}', [HospitalController::class, 'detailPatientHospital']);

// Edit

Route::get('/edit-pastmedical/{patient_id}/{date}',[PastMedicalController::class,'edit']);

Route::get('/edit-phyexamination/{patient_id}/{date}',[PhyExaminationController::class,'edit']);

Route::get('/edit-diagnosis/{patient_id}/{date}',[DiagnosisController::class,'edit']);

Route::get('/edit-investigation/{patient_id}/{date}',[InvestigationController::class,'edit']);

Route::get('/edit-treatment/{patient_id}/{date}',[TreatmentController::class,'edit']);

Route::get('/edit-dead/{patient_id}/{date}',[DeadController::class,'edit']);

Route::get('/edit-discharge/{patient_id}/{date}',[DischargeController::class,'edit']);

Route::get('/edit-progress/{patient_id}/{date}',[ProgressNoteController::class,'edit']);

Route::get('/edit-ptoverall/{patient_id}/{date}',[PtOverallController::class,'edit']);

Route::get('/edit-monitoring/{patient_id}/{date}',[MonitoringController::class,'edit']);

Route::get('/edit-imaging/{patient_id}/{date}',[ImagingController::class,'edit']);

Route::get('/edit-consultation/{patient_id}/{date}',[ConsultationController::class,'edit']);

// Import File

Route::post('importFile',[LabController::class, 'importFile']);

Route::post('totalPatient',[PatientController::class, 'totalPatientImport']);



// Search

Route::get('/searchTotalDate',[PatientController::class,'searchTotalDate']);
