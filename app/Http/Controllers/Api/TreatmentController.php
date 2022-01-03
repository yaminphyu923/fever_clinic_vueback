<?php

namespace App\Http\Controllers\Api;

use App\Models\Treatment;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PrescriptiveMedicine;

class TreatmentController extends Controller
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
            for($i=0;$i <= count(array($request->get('medical_list_id')));$i++){
                $sql = new Treatment;
                $sql->patient_id = $request->patient_id;
                $sql->note = $request->note;
                $sql->doctor_id = $request->doctor_id;
                $sql->pharmacy = $request->pharmacy;
                $sql->pre_date = $request->pre_date;
                $sql->queue = $request->queue;
                $sql->medical_list_id = $request->get('medical_list_id')[$i];
                $sql->dose = $request->get('dose')[$i];
                $sql->frequency = $request->get('frequency')[$i];
                $sql->start_date = $request->get('start_date')[$i];
                $sql->end_date = $request->get('end_date')[$i];
                $sql->remark = $request->get('remark')[$i];
                $sql->user_id = $request->user_id;
                $sql->save();

                $pre = new PrescriptiveMedicine;
                $pre->date = $request->pre_date;
                $pre->patient_id = $request->patient_id;
                $pre->doctor_id = $request->doctor_id;
                $pre->medical_list_id = $request->get('medical_list_id')[$i];
                $pre->user_id = $request->user_id;
                $pre->save();

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
