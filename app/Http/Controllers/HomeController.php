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
        return view('layouts.patients.create_patient');
    }

    public function doctor(){
        return view('layouts.doctors.doctor');
    }

    public function speciality(){
        return view('layouts.doctors.speciality');
    }

    public function degree(){
        return view('layouts.doctors.degree');
    }
}
