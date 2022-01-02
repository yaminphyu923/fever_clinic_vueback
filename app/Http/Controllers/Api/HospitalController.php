<?php

namespace App\Http\Controllers\Api;

use App\Models\Hospital;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $hospital->taste_smell = $request->taste_smell;
        $hospital->malaise = $request->malaise;
        $hospital->odema = $request->odema;
        $hospital->date_onset = $request->date_onset;
        $hospital->date_covid = $request->date_covid;
        $hospital->refer_to = $request->refer_to;
        $hospital->others = $request->others;
        $hospital->user_id = $request->user_id;
        $hospital->save();
        return ApiResponse::success('Success',null);
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
