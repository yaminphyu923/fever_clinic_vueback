<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Patient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth_id = auth()->user()->id;
        return view('layouts.home',compact('auth_id'));
    }

    public function patientCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.patients.create_patient',compact('auth_id'));
    }

    public function hospitalCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.hospitals.create_hospital',compact('auth_id'));
    }

    public function treatmentCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.treatments.create_treatment',compact('auth_id'));
    }

    public function imagingCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.imagings.create_imaging',compact('auth_id'));
    }

    public function doctor(){
        $auth_id = auth()->user()->id;
        return view('layouts.doctors.doctor',compact('auth_id'));
    }

    public function editDoctor(){
        $auth_id = auth()->user()->id;
        return view('layouts.doctors.edit_doctor',compact('auth_id'));
    }

    public function speciality(){
        $auth_id = auth()->user()->id;
        return view('layouts.doctors.speciality',compact('auth_id'));
    }

    public function editSpeciality(){
        $auth_id = auth()->user()->id;
        return view('layouts.doctors.edit_speciality',compact('auth_id'));
    }

    public function degree(){
        $auth_id = auth()->user()->id;
        return view('layouts.doctors.degree',compact('auth_id'));
    }

    public function editDegree(){
        $auth_id = auth()->user()->id;
        return view('layouts.doctors.edit_degree',compact('auth_id'));
    }

    public function hrmanagement(){
        $auth_id = auth()->user()->id;
        return view('layouts.hr_managements.hr_management',compact('auth_id'));
    }

    public function edithrmanagement(){
        $auth_id = auth()->user()->id;
        return view('layouts.hr_managements.edit_hr_management',compact('auth_id'));
    }

    public function position(){
        $auth_id = auth()->user()->id;
        return view('layouts.positions.position',compact('auth_id'));
    }

    public function editPosition(){
        $auth_id = auth()->user()->id;
        return view('layouts.positions.edit_position',compact('auth_id'));
    }

    public function medicalList(){
        $auth_id = auth()->user()->id;
        return view('layouts.medical_lists.medical_list',compact('auth_id'));
    }

    public function detailMedicalList(){
        $auth_id = auth()->user()->id;
        return view('layouts.medical_lists.detail_medical_list',compact('auth_id'));
    }

    public function medicalCategory(){
        $auth_id = auth()->user()->id;
        return view('layouts.medical_lists.medical_category',compact('auth_id'));
    }

    public function editMedicalCategory(){
        $auth_id = auth()->user()->id;
        return view('layouts.medical_lists.edit_medical_category',compact('auth_id'));
    }

    public function lab(){
        $auth_id = auth()->user()->id;
        return view('layouts.labs.lab',compact('auth_id'));
    }

    public function editLab(){
        $auth_id = auth()->user()->id;
        return view('layouts.labs.edit_lab',compact('auth_id'));
    }

    public function labCategory(){
        $auth_id = auth()->user()->id;
        return view('layouts.labs.lab_category',compact('auth_id'));
    }

    public function group(){
        $auth_id = auth()->user()->id;
        return view('layouts.labs.group',compact('auth_id'));
    }

    public function editGroup(){
        $auth_id = auth()->user()->id;
        return view('layouts.labs.edit_group',compact('auth_id'));
    }

    public function editLabCategory(){
        $auth_id = auth()->user()->id;
        return view('layouts.labs.edit_lab_category',compact('auth_id'));
    }

    public function prescriptiveMedicine(){
        $auth_id = auth()->user()->id;
        return view('layouts.medical_lists.prescriptive_medicine',compact('auth_id'));
    }

    public function investigationCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.investigations.investigation',compact('auth_id'));
    }

    public function disease(){
        $auth_id = auth()->user()->id;
        return view('layouts.diseases.disease',compact('auth_id'));
    }

    public function editDisease(){
        $auth_id = auth()->user()->id;
        return view('layouts.diseases.edit_disease',compact('auth_id'));
    }

    public function pastMedicalCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.pastmedicals.create_pastmedical',compact('auth_id'));
    }

    public function phyExaminationCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.phy_examinations.create_phy_examination',compact('auth_id'));
    }

    public function diagnosisCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.diagnoses.create_diagnosis',compact('auth_id'));
    }

    public function deadCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.deads.create_dead',compact('auth_id'));
    }

    public function dischargeCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.discharges.create_discharge',compact('auth_id'));
    }

    public function progressNoteCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.progress_notes.create_progress',compact('auth_id'));
    }

    public function ptOverallCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.pt_overalls.create_ptoverall',compact('auth_id'));
    }

    public function monitoringCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.monitorings.create_monitoring',compact('auth_id'));
    }

    public function consultationCreate(){
        $auth_id = auth()->user()->id;
        return view('layouts.consultations.create_consultation',compact('auth_id'));
    }

    public function editHistory(){
        $auth_id = auth()->user()->id;
        return view('layouts.edit_history',compact('auth_id'));
    }

    public function user(){
        $auth_id = auth()->user()->id;
        return view('layouts.users.user',compact('auth_id'));
    }

    public function editUser(){
        return view('layouts.users.edit_user');
    }

    public function register(){
        // $auth_id = auth()->user()->id;
        return view('layouts.users.register');
    }

    public function newlyRegister(){
        // $auth_id = auth()->user()->id;
        return view('layouts.users.newly_register');
    }

    public function totalPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.patient_lists.total_patient',compact('auth_id'));
    }

    public function inPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.patient_lists.in_patient',compact('auth_id'));
    }

    public function outPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.patient_lists.out_patient',compact('auth_id'));
    }

    public function deadPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.patient_lists.dead_patient',compact('auth_id'));
    }

    public function comoPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.patient_lists.comobidity_patient',compact('auth_id'));
    }

    public function referralPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.patient_lists.referral_patient',compact('auth_id'));
    }

    public function detailPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.patients.detail_patient',compact('auth_id'));
    }

    public function roleManagement(){
        $auth_id = auth()->user()->id;
        return view('layouts.roles.role',compact('auth_id'));
    }

    public function createRole(){
        return view('layouts.roles.create_role');
    }

    public function editRole(){
        return view('layouts.roles.edit_role');
    }

    public function showRole(){
        return view('layouts.roles.show_role');
    }

    public function permission(){
        $auth_id = auth()->user()->id;
        return view('layouts.permissions.permission',compact('auth_id'));
    }

    public function createPermission(){
        return view('layouts.permissions.create_permission');
    }

    public function editPermission(){
        return view('layouts.permissions.edit_permission');
    }

    public function newPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_patient',compact('auth_id'));
    }

    public function newHospital(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_hospital',compact('auth_id'));
    }

    public function newPastMedical(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_pastmedical',compact('auth_id'));
    }

    public function newPhyExamination(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_phyexamination',compact('auth_id'));
    }

    public function newDiagnosis(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_diagnosis',compact('auth_id'));
    }

    public function newInvestigation(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_investigation',compact('auth_id'));
    }

    public function newTreatment(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_treatment',compact('auth_id'));
    }

    public function newDead(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_dead',compact('auth_id'));
    }

    public function newDischarge(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_discharge',compact('auth_id'));
    }

    public function newProgress(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_progress',compact('auth_id'));
    }

    public function newPtOverall(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_ptoverall',compact('auth_id'));
    }

    public function newMonitoring(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_monitoring',compact('auth_id'));
    }

    public function newImaging(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_imaging',compact('auth_id'));
    }

    public function newConsultation(){
        $auth_id = auth()->user()->id;
        return view('layouts.new_medical_histories.new_consultation',compact('auth_id'));
    }

    public function editPatient(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_patient',compact('auth_id'));
    }

    public function editPat(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_pat',compact('auth_id'));
    }

    public function editHospital(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_hospital',compact('auth_id'));
    }

    public function editPastMedical(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_pastmedical',compact('auth_id'));
    }

    public function editPhyExamination(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_phyexamination',compact('auth_id'));
    }

    public function editDiagnosis(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_diagnosis',compact('auth_id'));
    }

    public function editInvestigation(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_investigation',compact('auth_id'));
    }

    public function editTreatment(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_treatment',compact('auth_id'));
    }

    public function editDead(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_dead',compact('auth_id'));
    }

    public function editDischarge(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_discharge',compact('auth_id'));
    }

    public function editProgress(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_progress',compact('auth_id'));
    }

    public function editPtOverall(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_ptoverall',compact('auth_id'));
    }

    public function editMonitoring(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_monitoring',compact('auth_id'));
    }

    public function editImaging(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_imaging',compact('auth_id'));
    }

    public function editConsultation(){
        $auth_id = auth()->user()->id;
        return view('layouts.edits.edit_consultation',compact('auth_id'));
    }

    public function duty(){
        $auth_id = auth()->user()->id;
        return view('layouts.duty_roasters.duty_roaster',compact('auth_id'));
    }

    public function hrDuty(){
        $auth_id = auth()->user()->id;
        return view('layouts.duty_roasters.hrduty',compact('auth_id'));
    }

    public function time(){
        $auth_id = auth()->user()->id;
        return view('layouts.duty_roasters.time',compact('auth_id'));
    }

    public function editTime(){
        $auth_id = auth()->user()->id;
        return view('layouts.duty_roasters.edit_time',compact('auth_id'));
    }

    public function editDuty(){
        $auth_id = auth()->user()->id;
        return view('layouts.duty_roasters.edit_duty_roaster',compact('auth_id'));
    }

    public function editHRDuty(){
        $auth_id = auth()->user()->id;
        return view('layouts.duty_roasters.edit_hrduty',compact('auth_id'));
    }

    public function building(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.building',compact('auth_id'));
    }

    public function editBuilding(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.edit_building',compact('auth_id'));
    }

    public function floor(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.floor',compact('auth_id'));
    }

    public function editFloor(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.edit_floor',compact('auth_id'));
    }

    public function room(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.room',compact('auth_id'));
    }

    public function editRoom(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.edit_room',compact('auth_id'));
    }

    public function bed(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.bed',compact('auth_id'));
    }

    public function editBed(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.edit_bed',compact('auth_id'));
    }

    public function donation(){
        $auth_id = auth()->user()->id;
        return view('layouts.donations.donation',compact('auth_id'));
    }

    public function expense(){
        $auth_id = auth()->user()->id;
        return view('layouts.donations.expense',compact('auth_id'));
    }

    public function remain(){
        $auth_id = auth()->user()->id;
        return view('layouts.donations.remain',compact('auth_id'));
    }

    public function summary(){
        $auth_id = auth()->user()->id;
        return view('layouts.room_beds.summary',compact('auth_id'));
    }

    public function pdf(){
        $auth_id = auth()->user()->id;
        return view('layouts.pdf',compact('auth_id'));
    }

    public function createPDF($id) {
        $patients = Patient::find($id);
        $pdf = PDF::loadView('layouts.pdf',compact('patients'))
                    ->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->stream();
    }

    public function userGuide(){
        return view('layouts.user_guide');
    }

}
