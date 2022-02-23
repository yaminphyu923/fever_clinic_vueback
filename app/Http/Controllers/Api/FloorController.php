<?php

namespace App\Http\Controllers\Api;

use App\Models\Floor;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floors = Floor::all();
        return ApiResponse::success('Success',$floors);
    }

    public function floorPaginate(Request $request){
        if($request->search){
            $floors = Floor::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$floors);
        }
        else{
            $floors = Floor::latest('id')->paginate(10);
            return ApiResponse::success('Success',$floors);
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
        $floor = new Floor;
        $floor->name = $request->name;
        $floor->user_id = $request->user_id;
        $floor->save();
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
        $floor = Floor::find($id);
        return ApiResponse::success('Successful',$floor);
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
        $floor = Floor::find($id);
        $floor->name = $request->name;
        $floor->user_id = $request->user_id;
        $floor->save();
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
        Floor::where('id',$id)->delete();
        return 'success';
    }
}
