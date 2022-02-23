<?php

namespace App\Http\Controllers\Api;

use App\Models\Dead;
use App\Models\Patient;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DeadController extends Controller
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
        $dead = new Dead;
        $dead->patient_id = $request->patient_id;
        $dead->dead_time = $request->dead_time;
        $dead->cause = $request->cause;
        $dead->doctor_id = $request->doctor_id;
        $dead->note = $request->note;
        $dead->user_id = $request->user_id;
        $dead->save();

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
        $patient->dead = 1;
        $patient->dead_date = $patient->dead_date;
        $patient->refer = $patient->refer_to;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($patient_id,$date){
        $dead = Dead::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$dead);
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
        $dead = Dead::find($id);
        $dead->patient_id = $request->patient_id;
        $dead->dead_time = $request->dead_time;
        $dead->cause = $request->cause;
        $dead->doctor_id = $request->doctor_id;
        $dead->note = $request->note;
        $dead->user_id = $request->user_id;
        $dead->save();

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
        $patient->dead = 1;
        $patient->dead_date = $patient->dead_date;
        $patient->refer = $patient->refer_to;
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
        //
    }

    public function detailDeadPrint($patient_id){
        $deads = Dead::with('patient','doctor')
                            ->where('patient_id',$patient_id)
                            ->latest('id')->get();
        return ApiResponse::success('successful',$deads);
    }
}
