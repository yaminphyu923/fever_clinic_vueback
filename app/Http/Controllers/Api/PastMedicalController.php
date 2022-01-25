<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Models\PastMedical;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PastMedicalController extends Controller
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
        $this->validate($request,[
            "patient_id" => "required",
        ]);

        DB::beginTransaction();
        try{
            $past = new PastMedical;
            $past->patient_id = $request->patient_id;
            $past->dm = $request->dm;
            $past->ht = $request->ht;
            $past->ihd = $request->ihd;
            $past->stroke = $request->stroke;
            $past->renal = $request->renal;
            $past->liver = $request->liver;
            $past->bleeding = $request->bleeding;
            $past->como = $request->como;
            $past->comobidity = $request->comobidity;
            $past->past = $request->past;
            $past->drug = $request->drug;
            $past->drug_allergy = $request->drug_allergy;
            $past->last_meal = $request->last_meal;
            $past->smoking = $request->smoking;
            $past->alcohol = $request->alcohol;
            $past->pregnancy = $request->pregnancy;
            $past->recent_drugs = $request->recent_drugs;
            $past->regular_drugs = $request->regular_drugs;
            $past->medication = $request->medication;
            $past->system_enquery = $request->system_enquery;
            $past->pre_hospital = $request->pre_hospital;
            $past->user_id = $request->user_id;
            $past->save();

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
            $patient->como = $request->como;
            $patient->comobidity = $request->comobidity;
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
        $past_medicals = PastMedical::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$past_medicals);
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
        $this->validate($request,[
            "patient_id" => "required",
        ]);

        DB::beginTransaction();
        try{
            $past = PastMedical::find($id);
            $past->patient_id = $request->patient_id;
            $past->dm = $request->dm;
            $past->ht = $request->ht;
            $past->ihd = $request->ihd;
            $past->stroke = $request->stroke;
            $past->renal = $request->renal;
            $past->liver = $request->liver;
            $past->bleeding = $request->bleeding;
            $past->como = $request->como;
            $past->comobidity = $request->comobidity;
            $past->past = $request->past;
            $past->drug = $request->drug;
            $past->drug_allergy = $request->drug_allergy;
            $past->last_meal = $request->last_meal;
            $past->smoking = $request->smoking;
            $past->alcohol = $request->alcohol;
            $past->pregnancy = $request->pregnancy;
            $past->recent_drugs = $request->recent_drugs;
            $past->regular_drugs = $request->regular_drugs;
            $past->medication = $request->medication;
            $past->system_enquery = $request->system_enquery;
            $past->pre_hospital = $request->pre_hospital;
            $past->user_id = $request->user_id;
            $past->save();

            $patient = Patient::find($request->patient_id);
            // $patient->name = $patient->name;
            // $patient->gender = $patient->gender;
            // $patient->age = $patient->age;
            // $patient->dob = $patient->dob;
            // $patient->nrc = $patient->nrc;
            // $patient->phone = $patient->phone;
            // $patient->address = $patient->address;
            // $patient->nextKin = $patient->nextKin;
            // $patient->attendent = $patient->attendent;
            // $patient->occupation = $patient->occupation;
            // $patient->symptoms = $patient->symptoms;
            // $patient->travelHistory = $patient->travelHistory;
            // $patient->remark = $patient->remark;
            // $patient->date = $patient->date;
            $patient->como = $request->como;
            $patient->comobidity = $request->comobidity;
            // $patient->user_id = $patient->user_id;
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
}
