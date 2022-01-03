<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('layouts.home');
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
        return view('layouts.hr_managements.hr_management');
    }

    public function edithrmanagement(){
        return view('layouts.hr_managements.edit_hr_management');
    }

    public function position(){
        return view('layouts.positions.position');
    }

    public function editPosition(){
        return view('layouts.positions.edit_position');
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
}
