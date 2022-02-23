<?php

namespace App\Http\Controllers\Api;

use App\Models\Discharge;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DischargeController extends Controller
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
        $discharge = new Discharge;
        $discharge->patient_id = $request->patient_id;
        $discharge->time = $request->time;
        $discharge->place = $request->place;
        $discharge->opd = $request->opd;
        $discharge->admission = $request->admission;
        $discharge->refer_to = $request->refer_to;
        $discharge->pr = $request->pr;
        $discharge->spo2 = $request->spo2;
        $discharge->bp = $request->bp;
        $discharge->gcs = $request->gcs;
        $discharge->user_id = $request->user_id;
        $discharge->save();
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

    public function edit($patient_id,$date){
        $discharge = Discharge::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$discharge);
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
        $discharge = Discharge::find($id);
        $discharge->patient_id = $request->patient_id;
        $discharge->time = $request->time;
        $discharge->place = $request->place;
        $discharge->opd = $request->opd;
        $discharge->admission = $request->admission;
        $discharge->refer_to = $request->refer_to;
        $discharge->pr = $request->pr;
        $discharge->spo2 = $request->spo2;
        $discharge->bp = $request->bp;
        $discharge->gcs = $request->gcs;
        $discharge->user_id = $request->user_id;
        $discharge->save();
        return ApiResponse::success('Successful',null);
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

    public function detailDischargePrint($patient_id){
        $discharges = Discharge::with('patient')
                            ->where('patient_id',$patient_id)
                            ->latest('id')->get();
        return ApiResponse::success('successful',$discharges);
    }
}
