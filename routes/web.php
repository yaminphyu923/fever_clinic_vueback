<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\LabController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/mmcities',[LoginController::class,'showLoginForm'])->name('login');

Route::post('/home-register',[RegisterController::class,'store'])->name('homeRegister');

Route::get('/register',[RegisterController::class,'register'])->name('register');

Route::get('/patient-create', [HomeController::class, 'patientCreate']);

Route::get('/hospital-create', [HomeController::class, 'hospitalCreate']);

Route::get('/treatment-create', [HomeController::class, 'treatmentCreate']);

Route::get('/imaging-create', [HomeController::class, 'imagingCreate']);

Route::get('/investigation-create', [HomeController::class, 'investigationCreate']);

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

Route::get('/lab/{id}',[HomeController::class, 'editLab']);

Route::get('/lab_category', [HomeController::class, 'labCategory']);

Route::get('/group', [HomeController::class, 'group']);

Route::get('/group/{id}', [HomeController::class, 'editGroup']);

Route::get('/lab_category/{id}', [HomeController::class, 'editLabCategory']);

Route::get('/pre_medicine',[HomeController::class, 'prescriptiveMedicine']);

Route::get('/disease',[HomeController::class, 'disease']);

Route::get('/disease/{id}',[HomeController::class, 'editDisease']);

Route::get('/pastmedical-create',[HomeController::class, 'pastMedicalCreate']);

Route::get('/phyexamination-create',[HomeController::class, 'phyExaminationCreate']);

Route::get('/diagnosis-create',[HomeController::class, 'diagnosisCreate']);

Route::get('/dead-create',[HomeController::class, 'deadCreate']);

Route::get('/discharge-create',[HomeController::class, 'dischargeCreate']);

Route::get('/progress-create',[HomeController::class, 'progressNoteCreate']);

Route::get('/ptoverall-create',[HomeController::class, 'ptOverallCreate']);

Route::get('/monitoring-create',[HomeController::class, 'monitoringCreate']);

Route::get('/consultation-create',[HomeController::class, 'consultationCreate']);

Route::get('/edit-history',[HomeController::class, 'editHistory']);

Route::get('/user',[HomeController::class, 'user']);

Route::get('/edit_user/{id}',[HomeController::class, 'editUser']);

Route::get('/register-patient',[HomeController::class, 'register']);

Route::get('/newlyregister-patient',[HomeController::class, 'newlyRegister']);

Route::get('/total-patient',[HomeController::class, 'totalPatient']);

Route::get('/in-patient',[HomeController::class, 'inPatient']);

Route::get('/out-patient',[HomeController::class, 'outPatient']);

Route::get('/dead-patient',[HomeController::class, 'deadPatient']);

Route::get('/como-patient',[HomeController::class, 'comoPatient']);

Route::get('/referral-patient',[HomeController::class, 'referralPatient']);

Route::get('/detail-patient/{id}',[HomeController::class, 'detailPatient']);

Route::resource('roles', RoleController::class);

Route::resource('users', UserController::class);

Route::get('/role_management',[HomeController::class, 'roleManagement']);

Route::get('/create-role',[HomeController::class, 'createRole']);

Route::get('/edit-role/{id}',[HomeController::class, 'editRole']);

Route::get('/show-role/{id}',[HomeController::class, 'showRole']);

Route::get('/permission',[HomeController::class, 'permission']);

Route::get('/create-permission',[HomeController::class, 'createPermission']);

Route::get('/edit-permission/{id}',[HomeController::class, 'editPermission']);


// new medical history
Route::get('/new-patient/{id}',[HomeController::class, 'newPatient']);

Route::get('/new-hospital/{id}',[HomeController::class, 'newHospital']);

Route::get('/new-past-medical/{id}',[HomeController::class, 'newPastMedical']);

Route::get('/new-phyexamination/{id}',[HomeController::class, 'newPhyExamination']);

Route::get('/new-diagnosis/{id}',[HomeController::class, 'newDiagnosis']);

Route::get('/new-investigation/{id}',[HomeController::class, 'newInvestigation']);

Route::get('/new-treatment/{id}',[HomeController::class, 'newTreatment']);

Route::get('/new-dead/{id}',[HomeController::class, 'newDead']);

Route::get('/new-discharge/{id}',[HomeController::class, 'newDischarge']);

Route::get('/new-progress/{id}',[HomeController::class, 'newProgress']);

Route::get('/new-ptoverall/{id}',[HomeController::class, 'newPtOverall']);

Route::get('/new-monitoring/{id}',[HomeController::class, 'newMonitoring']);

Route::get('/new-imaging/{id}',[HomeController::class, 'newImaging']);

Route::get('/new-consultation/{id}',[HomeController::class, 'newConsultation']);

Route::get('/edit-patient/{id}/{hospital_id}/{date}',[HomeController::class, 'editPatient']);

Route::get('/edit-pat/{id}',[HomeController::class, 'editPat']);

Route::get('/edit-hospital/{patient_id}/{id}/{date}',[HomeController::class, 'editHospital']);

Route::get('/edit-pastmedical/{patient_id}/{id}/{date}',[HomeController::class, 'editPastMedical']);

Route::get('/edit-phyexamination/{patient_id}/{id}/{date}',[HomeController::class, 'editPhyExamination']);

Route::get('/edit-diagnosis/{patient_id}/{id}/{date}',[HomeController::class, 'editDiagnosis']);

Route::get('/edit-investigation/{patient_id}/{id}/{date}',[HomeController::class, 'editInvestigation']);

Route::get('/edit-treatment/{patient_id}/{id}/{date}',[HomeController::class, 'editTreatment']);

Route::get('/edit-dead/{patient_id}/{id}/{date}',[HomeController::class, 'editDead']);

Route::get('/edit-discharge/{patient_id}/{id}/{date}',[HomeController::class, 'editDischarge']);

Route::get('/edit-progress/{patient_id}/{id}/{date}',[HomeController::class, 'editProgress']);

Route::get('/edit-ptoverall/{patient_id}/{id}/{date}',[HomeController::class, 'editPtOverall']);

Route::get('/edit-monitoring/{patient_id}/{id}/{date}',[HomeController::class, 'editMonitoring']);

Route::get('/edit-imaging/{patient_id}/{id}/{date}',[HomeController::class, 'editImaging']);

Route::get('/edit-consultation/{patient_id}/{id}/{date}',[HomeController::class, 'editConsultation']);

Route::get('/duty',[HomeController::class, 'duty']);

Route::get('/hrDuty',[HomeController::class, 'hrDuty']);

Route::get('/doctor_duties/{id}',[HomeController::class, 'editDuty']);

Route::get('/time',[HomeController::class, 'time']);

Route::get('/times/{id}',[HomeController::class, 'editTime']);

Route::get('/hr_duties/{id}',[HomeController::class, 'editHRDuty']);

Route::get('/building',[HomeController::class, 'building']);

Route::get('/buildings/{id}',[HomeController::class, 'editBuilding']);

Route::get('/floor',[HomeController::class, 'floor']);

Route::get('/floors/{id}',[HomeController::class, 'editFloor']);

Route::get('/room',[HomeController::class, 'room']);

Route::get('/rooms/{id}',[HomeController::class, 'editRoom']);

Route::get('/bed',[HomeController::class, 'bed']);

Route::get('/beds/{id}',[HomeController::class, 'editBed']);

Route::get('/donation',[HomeController::class, 'donation']);

Route::get('/expense',[HomeController::class, 'expense']);

Route::get('/remain',[HomeController::class, 'remain']);

Route::get('/summary',[HomeController::class, 'summary']);

Route::get('/pdf/{id}',[HomeController::class, 'pdf']);

Route::get('/createPDF/{id}', [HomeController::class, 'createPDF']);

Route::get('/userGuide', [HomeController::class, 'userGuide']);


// Excel

Route::get('labs-export', [LabController::class, 'labExport'])->name('lab-export');

Route::get('totalpatient-export', [PatientController::class, 'totalPatientExport'])->name('totalpatient-export');

Route::get('inpatient-export', [PatientController::class, 'inPatientExport'])->name('inpatient-export');

Route::get('outpatient-export', [PatientController::class, 'outPatientExport'])->name('outpatient-export');

Route::get('deadpatient-export', [PatientController::class, 'deadPatientExport'])->name('deadpatient-export');

Route::get('comopatient-export', [PatientController::class, 'comoPatientExport'])->name('comopatient-export');

Route::get('referralpatient-export', [PatientController::class, 'referralPatientExport'])->name('referralpatient-export');

