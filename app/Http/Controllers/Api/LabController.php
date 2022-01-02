<?php

namespace App\Http\Controllers\Api;

use App\Models\Lab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Lab::latest('id')->get();
        return ApiResponse::success('Success',$labs);
    }

    public function labPaginate(Request $request){
        if($request->search){
            $labs = Lab::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$groups);
        }
        else{
            $labs = Lab::latest('id')->paginate(10);
            return ApiResponse::success('Success',$labs);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lab = new Lab;
        $lab->name = $request->name;
        $lab->unit = $request->unit;
        $lab->range = $request->range;
        $lab->lab_category_id = $request->lab_category_id;
        $lab->group_id = $request->group_id;
        $lab->user_id = $request->user_id;
        $lab->save();
        return ApiResponse::success("Successful",null);
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
