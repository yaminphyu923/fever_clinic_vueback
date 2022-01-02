<?php

namespace App\Http\Controllers\Api;

use App\Models\Speciality;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::latest('id')->get();
        return ApiResponse::success('Success',$specialities);
    }

    public function specialityPaginate(Request $request){
        if($request->search){
            $specialities = Speciality::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$specialities);
        }
        else{
            $specialities = Speciality::latest('id')->paginate(10);
            return ApiResponse::success('Success',$specialities);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $speciality = new Speciality;
        $speciality->name = $request->name;
        $speciality->code = $request->code;
        $speciality->user_id = $request->user_id;
        $speciality->save();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speciality = Speciality::find($id);
        return ApiResponse::success('Success',$speciality);
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
        $speciality = Speciality::find($id);
        $speciality->name = $request->name;
        $speciality->code = $request->code;
        $speciality->user_id = $request->user_id;
        $speciality->save();
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
        Speciality::where('id',$id)->delete();
        return ApiResponse::success('success',null);
    }
}
