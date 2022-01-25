<?php

namespace App\Http\Controllers\Api;

use App\Models\Monitoring;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonitoringController extends Controller
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
        $monitoring = new Monitoring;
        $monitoring->patient_id = $request->patient_id;
        $monitoring->pr = $request->pr;
        $monitoring->crt = $request->crt;
        $monitoring->emergency = $request->emergency;
        $monitoring->t = $request->t;
        $monitoring->spo2 = $request->spo2;
        $monitoring->rbs = $request->rbs;
        $monitoring->gcs = $request->gcs;
        $monitoring->pupil = $request->pupil;
        $monitoring->bp = $request->bp;
        $monitoring->urine = $request->urine;
        $monitoring->date = $request->date;
        $monitoring->tx = $request->tx;
        $monitoring->pain_score = $request->pain_score;
        $monitoring->user_id = $request->user_id;
        $monitoring->save();
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
        $monitoring = Monitoring::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$monitoring);
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
        $monitoring = Monitoring::find($id);
        $monitoring->patient_id = $request->patient_id;
        $monitoring->pr = $request->pr;
        $monitoring->crt = $request->crt;
        $monitoring->emergency = $request->emergency;
        $monitoring->t = $request->t;
        $monitoring->spo2 = $request->spo2;
        $monitoring->rbs = $request->rbs;
        $monitoring->gcs = $request->gcs;
        $monitoring->pupil = $request->pupil;
        $monitoring->bp = $request->bp;
        $monitoring->urine = $request->urine;
        $monitoring->date = $request->date;
        $monitoring->tx = $request->tx;
        $monitoring->pain_score = $request->pain_score;
        $monitoring->user_id = $request->user_id;
        $monitoring->save();
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
}
