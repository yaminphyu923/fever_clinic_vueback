<?php

namespace App\Http\Controllers\Api;

use App\Models\Diagnosis;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiagnosisController extends Controller
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
        $diagnosis = new Diagnosis;
        $diagnosis->patient_id = $request->patient_id;
        $diagnosis->diagnosis = $request->diagnosis;
        $diagnosis->dia = $request->dia;
        $diagnosis->information = $request->information;
        $diagnosis->treatment = $request->treatment;
        $diagnosis->user_id = $request->user_id;
        $diagnosis->save();
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
        $diagnosis = Diagnosis::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$diagnosis);
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
        $diagnosis = Diagnosis::find($id);
        $diagnosis->patient_id = $request->patient_id;
        $diagnosis->diagnosis = $request->diagnosis;
        $diagnosis->dia = $request->dia;
        $diagnosis->information = $request->information;
        $diagnosis->treatment = $request->treatment;
        $diagnosis->user_id = $request->user_id;
        $diagnosis->save();
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

    public function detailDiagnosisPrint($patient_id){
        $diagnoses = Diagnosis::with('patient')
                            ->where('patient_id',$patient_id)
                            ->latest('id')->get();
        return ApiResponse::success('successful',$diagnoses);
    }
}
