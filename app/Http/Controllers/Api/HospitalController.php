<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Models\Hospital;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function detailPatientHospital($patient_id){
        $hospital = Hospital::with('patient')
                            ->where('patient_id',$patient_id)
                            ->latest('id')->paginate(10);
        return ApiResponse::success('successful',$hospital);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
        $hospital = new Hospital;
        $hospital->patient_id = $request->patient_id;
        $hospital->date = $request->date;
        $hospital->admission = $request->admission;
        $hospital->bed_id = $request->bed_id;
        $hospital->doctor_multiple_id = $request->doctor_multiple_id;
        $hospital->doctor_incharge_id = $request->doctor_incharge_id;
        $hospital->police_case = $request->police_case;
        $hospital->fever = $request->fever;
        $hospital->sore_throat = $request->sore_throat;
        $hospital->chills = $request->chills;
        $hospital->shaking_chills = $request->shaking_chills;
        $hospital->headache = $request->headache;
        $hospital->taste_smell = $request->taste_smell;
        $hospital->malaise = $request->malaise;
        $hospital->odema = $request->odema;
        $hospital->date_onset = $request->date_onset;
        $hospital->date_covid = $request->date_covid;
        $hospital->refer_to = $request->refer_to;
        $hospital->others = $request->others;
        $hospital->user_id = $request->user_id;
        $hospital->save();

        if($request->refer_to != null){
            $patient = Patient::find($request->patient_id);
            $patient->name = $patient->name;
            $patient->gender = $patient->gender;
            $patient->age = $patient->age;
            $patient->dob = $patient->dob;
            $patient->nrc = $patient->nrc;
            $patient->phone = $patient->phone;
            $patient->address = $patient->address;
            $patient->nextKin = $patient->nextKin;
            $patient->attendent = $patient->attendent;
            $patient->occupation = $patient->occupation;
            $patient->symptoms = $patient->symptoms;
            $patient->travelHistory = $patient->travelHistory;
            $patient->remark = $patient->remark;
            $patient->date = $patient->date;
            $patient->como = $patient->como;
            $patient->comobidity = $patient->comobidity;
            $patient->out_patient = $patient->out_patient;
            $patient->out_date = $patient->out_date;
            $patient->dead = $patient->dead;
            $patient->dead_date = $patient->dead_date;
            $patient->refer = $request->refer_to;
            $patient->user_id = $patient->user_id;
            $patient->save();
        }

        DB::commit();
        return ApiResponse::success("Successful",null);

            }catch(\Exception $error){
            DB::rollBack();
            return ApiResponse::fail("Something Wrong",$error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = Hospital::find($id);
        return ApiResponse::success('Successful',$hospital);
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
        DB::beginTransaction();
        try{
        $hospital = Hospital::find($id);
        $hospital->patient_id = $request->patient_id;
        $hospital->date = $request->date;
        $hospital->admission = $request->admission;
        $hospital->bed_id = $request->bed_id;
        $hospital->doctor_multiple_id = $request->doctor_multiple_id;
        $hospital->doctor_incharge_id = $request->doctor_incharge_id;
        $hospital->police_case = $request->police_case;
        $hospital->fever = $request->fever;
        $hospital->sore_throat = $request->sore_throat;
        $hospital->chills = $request->chills;
        $hospital->shaking_chills = $request->shaking_chills;
        $hospital->headache = $request->headache;
        $hospital->taste_smell = $request->taste_smell;
        $hospital->malaise = $request->malaise;
        $hospital->odema = $request->odema;
        $hospital->date_onset = $request->date_onset;
        $hospital->date_covid = $request->date_covid;
        $hospital->refer_to = $request->refer_to;
        $hospital->others = $request->others;
        $hospital->user_id = $request->user_id;
        $hospital->save();


        $patient = Patient::find($request->patient_id);
        $patient->name = $patient->name;
        $patient->gender = $patient->gender;
        $patient->age = $patient->age;
        $patient->dob = $patient->dob;
        $patient->nrc = $patient->nrc;
        $patient->phone = $patient->phone;
        $patient->address = $patient->address;
        $patient->nextKin = $patient->nextKin;
        $patient->attendent = $patient->attendent;
        $patient->occupation = $patient->occupation;
        $patient->symptoms = $patient->symptoms;
        $patient->travelHistory = $patient->travelHistory;
        $patient->remark = $patient->remark;
        $patient->date = $patient->date;
        $patient->como = $patient->como;
        $patient->comobidity = $patient->comobidity;
        $patient->out_patient = $patient->out_patient;
        $patient->out_date = $patient->out_date;
        $patient->dead = $patient->dead;
        $patient->dead_date = $patient->dead_date;
        $patient->refer = $request->refer_to;
        $patient->user_id = $patient->user_id;
        $patient->save();


        DB::commit();
        return ApiResponse::success("Successful",null);

            }catch(\Exception $error){
            DB::rollBack();
            return ApiResponse::fail("Something Wrong",$error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hospital::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }
}
