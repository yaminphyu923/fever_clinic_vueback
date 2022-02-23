<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultationController extends Controller
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
        $consultation = new Consultation;
        $consultation->patient_id = $request->patient_id;
        $consultation->consultation = $request->consultation;
        $consultation->note = $request->note;
        $consultation->user_id = $request->user_id;
        $consultation->save();
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
        $consultation = Consultation::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$consultation);
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
        $consultation = Consultation::find($id);
        $consultation->patient_id = $request->patient_id;
        $consultation->consultation = $request->consultation;
        $consultation->note = $request->note;
        $consultation->user_id = $request->user_id;
        $consultation->save();
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

    public function detailConsultationPrint($patient_id){
        $consultations = Consultation::with('patient')
                            ->where('patient_id',$patient_id)
                            ->latest('id')->get();
        return ApiResponse::success('successful',$consultations);
    }
}
