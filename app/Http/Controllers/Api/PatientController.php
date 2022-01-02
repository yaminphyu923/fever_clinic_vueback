<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::latest('id')->get();
        return ApiResponse::success('success',$patients);
    }

    public function patientData(){
        $patients = Patient::select('id','name as text')->get()->toArray();
        return response()->json($patients);
    }

    public function patientPaginate(Request $request){
        if($request->search){
            $patients = Patient::where('name','like','%'.$request->search.'%')
                                ->orwhere('nrc','like','%'.$request->search.'%')
                                ->orwhere('phone','like','%'.$request->search.'%')
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
        else{
            $patients = Patient::latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
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
        $patient = new Patient;
        $patient->name = $request->name;
        $patient->gender = $request->gender;
        $patient->age = $request->age;
        $patient->dob = $request->dob;
        $patient->nrc = $request->nrc;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->nextKin = $request->nextKin;
        $patient->attendent = $request->attendent;
        $patient->occupation = $request->occupation;
        $patient->symptoms = $request->symptoms;
        $patient->travelHistory = $request->travelHistory;
        $patient->remark = $request->remark;
        $patient->date = $request->date;
        $patient->user_id = $request->user_id;
        $patient->save();

        return ApiResponse::success('success',null);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
