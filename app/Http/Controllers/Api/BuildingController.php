<?php

namespace App\Http\Controllers\Api;

use App\Models\Building;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::all();
        return ApiResponse::success('Success',$buildings);
    }

    public function buildingPaginate(Request $request){
        if($request->search){
            $buildings = Building::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$buildings);
        }
        else{
            $buildings = Building::latest('id')->paginate(10);
            return ApiResponse::success('Success',$buildings);
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
        $building = new Building;
        $building->name = $request->name;
        $building->user_id = $request->user_id;
        $building->save();
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
        $building = Building::find($id);
        return ApiResponse::success('Successful',$building);
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
        $building = Building::find($id);
        $building->name = $request->name;
        $building->user_id = $request->user_id;
        $building->save();
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
        Building::where('id',$id)->delete();
        return 'success';
    }
}
