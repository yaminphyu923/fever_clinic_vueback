<?php

namespace App\Http\Controllers\Api;

use App\Models\PtOverall;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PtOverallController extends Controller
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
        for($i=0;$i <= count(array($request->get('text')));$i++){
        $ptoverall = new PtOverall;
        $ptoverall->patient_id = $request->patient_id;
        $ptoverall->date = $request->date;
        $ptoverall->text = $request->get('text')[$i];
        $ptoverall->user_id = $request->user_id;
        $ptoverall->save();
        }
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

    }

    public function edit($patient_id,$date){
        $ptoverall = PtOverall::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->get();
        return ApiResponse::success('Successful',$ptoverall);
    }

    public function ptOverallUpdate(Request $request){
        $ptoveralls = $request->all();
        foreach ($request->all() as $data){
            $additional['patient_id'] = $ptoveralls[0]['patient_id'];
            $additional['date'] = $ptoveralls[0]['date'];
            $additional['text'] = $data['text'];
            $update_additional = PtOverall::where('id',$data['id'])->update($additional);
        }
        return ApiResponse::success("Successful", null);
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