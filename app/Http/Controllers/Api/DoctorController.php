<?php

namespace App\Http\Controllers\Api;

use App\Models\Doctor;
use App\Models\Speciality;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::with('degree')->with('speciality')->latest('id')->get();
        return ApiResponse::success('Successful',$doctors);
    }

    public function doctorData(){
        $doctors = Doctor::select('id','name as text')->get()->toArray();
        return response()->json($doctors);
    }

    public function doctorPaginate(Request $request){
        if($request->search){
            $doctors = Doctor::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$doctors);
        }
        else{
            $doctors = Doctor::with('degree')->with('speciality')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$doctors);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->degree_id = $request->degree_id;
        $doctor->speciality_id = $request->speciality_id;
        $doctor->user_id = $request->user_id;
        $doctor->save();
        return ApiResponse::success('Successful',null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return ApiResponse::success('success',$doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->degree_id = $request->degree_id;
        $doctor->speciality_id = $request->speciality_id;
        $doctor->user_id = $request->user_id;
        $doctor->save();
        return ApiResponse::success('Success',null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Doctor::where('id',$id)->delete();
        return ApiResponse::success('success',null);
    }
}
