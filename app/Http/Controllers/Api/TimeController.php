<?php

namespace App\Http\Controllers\Api;

use App\Models\Time;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::latest('id')->get();
        return ApiResponse::success('Successful',$times);
    }

    public function timeData(){
        $times = Time::select('id','time as text')->get()->toArray();
        return response()->json($times);
    }

    public function timePaginate(Request $request){
        if($request->search){
            $times = Time::where('time','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$times);
        }
        else{
            $times = Time::latest('id')->paginate(10);
            return ApiResponse::success('Success',$times);
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
        $time = new Time;
        $time->time = $request->time;
        $time->user_id = $request->user_id;
        $time->save();
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
        $time = Time::find($id);
        return ApiResponse::success('success',$time);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $time = Time::find($id);
        $time->time = $request->time;
        $time->user_id = $request->user_id;
        $time->save();
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
        Time::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }
}
