<?php

namespace App\Http\Controllers\Api;

use App\Models\Degree;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = Degree::latest('id')->get();
        return ApiResponse::success('Success',$degrees);
    }

    public function degreePaginate(Request $request){
        if($request->search){
            $degrees = Degree::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$degrees);
        }
        else{
            $degrees = Degree::latest('id')->paginate(10);
            return ApiResponse::success('Success',$degrees);
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
        $degree = new Degree;
        $degree->name = $request->name;
        $degree->fullname = $request->fullname;
        $degree->user_id = $request->user_id;
        $degree->save();
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
        $degree = Degree::find($id);
        return ApiResponse::success('Success',$degree);
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
        $degree = Degree::find($id);
        $degree->name = $request->name;
        $degree->fullname = $request->fullname;
        $degree->user_id = $request->user_id;
        $degree->save();
        return ApiResponse::success('Edit Successfully',null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Degree::where('id',$id)->delete();
        return ApiResponse::success('successful',null);
    }
}
