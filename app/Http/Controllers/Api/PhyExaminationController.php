<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\PhyExamination;
use App\Http\Controllers\Controller;

class PhyExaminationController extends Controller
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
        $phy_examination = new PhyExamination;
        $phy_examination->patient_id = $request->patient_id;
        $phy_examination->temperature = $request->temperature;
        $phy_examination->ecg = $request->ecg;
        $phy_examination->rbs = $request->rbs;
        $phy_examination->spo2 = $request->spo2;
        $phy_examination->bp = $request->bp;
        $phy_examination->pr = $request->pr;
        $phy_examination->rr = $request->rr;
        $phy_examination->well_orientated = $request->well_orientated;
        $phy_examination->pain = $request->pain;
        $phy_examination->voice = $request->voice;
        $phy_examination->no_response = $request->no_response;
        $phy_examination->general = $request->general;
        $phy_examination->head_neck = $request->head_neck;
        $phy_examination->chest = $request->chest;
        $phy_examination->abdomen_pelvic = $request->abdomen_pelvic;
        $phy_examination->spine = $request->spine;
        $phy_examination->upper_right = $request->upper_right;
        $phy_examination->upper_left = $request->upper_left;
        $phy_examination->lower_right = $request->lower_right;
        $phy_examination->lower_left = $request->lower_left;
        $phy_examination->refer_case = $request->refer_case;
        $phy_examination->other = $request->other;
        $phy_examination->user_id = $request->user_id;
        $phy_examination->save();

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
        $phy_examination = PhyExamination::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$phy_examination);
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
        $phy_examination = PhyExamination::find($id);
        $phy_examination->patient_id = $request->patient_id;
        $phy_examination->temperature = $request->temperature;
        $phy_examination->ecg = $request->ecg;
        $phy_examination->rbs = $request->rbs;
        $phy_examination->spo2 = $request->spo2;
        $phy_examination->bp = $request->bp;
        $phy_examination->pr = $request->pr;
        $phy_examination->rr = $request->rr;
        $phy_examination->well_orientated = $request->well_orientated;
        $phy_examination->pain = $request->pain;
        $phy_examination->voice = $request->voice;
        $phy_examination->no_response = $request->no_response;
        $phy_examination->general = $request->general;
        $phy_examination->head_neck = $request->head_neck;
        $phy_examination->chest = $request->chest;
        $phy_examination->abdomen_pelvic = $request->abdomen_pelvic;
        $phy_examination->spine = $request->spine;
        $phy_examination->upper_right = $request->upper_right;
        $phy_examination->upper_left = $request->upper_left;
        $phy_examination->lower_right = $request->lower_right;
        $phy_examination->lower_left = $request->lower_left;
        $phy_examination->refer_case = $request->refer_case;
        $phy_examination->other = $request->other;
        $phy_examination->user_id = $request->user_id;
        $phy_examination->save();

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
