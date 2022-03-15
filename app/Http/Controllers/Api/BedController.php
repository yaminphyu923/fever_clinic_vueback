<?php

namespace App\Http\Controllers\Api;

use App\Models\Bed;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beds = Bed::select('name')->distinct()->get();
        return ApiResponse::success('Success',$beds);
    }

    public function bedPaginate(Request $request){
        if($request->search){
            $beds = Bed::with('room','floor','building','user')->where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$beds);
        }
        else{
            $beds = Bed::with('room','floor','building','user')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$beds);
        }
    }

    public function vacant(Request $request){
        $beds = Bed::with('room','floor','building','user')
                        ->where('status',0)
                        ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$beds);
    }

    public function occupied(Request $request){
        $beds = Bed::with('room','floor','building','user')
                        ->where('status',1)
                        ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$beds);
    }

    public function bedSearch(Request $request){
        $beds = Bed::with('room','floor','building','user')
                    ->where('building_id','like','%'.$request->building_id.'%')
                    ->where('floor_id','like','%'.$request->floor_id.'%')
                    ->where('room_id','like','%'.$request->room_id.'%')
                    ->where('name','like','%'.$request->name.'%')
                    ->latest('id')->paginate(10);
        return ApiResponse::success('Success',$beds);
    }

    public function bedData(){
        $beds = Bed::join('rooms','rooms.id','=','beds.room_id')
                    ->join('floors','floors.id','=','beds.floor_id')
                    ->join('buildings','buildings.id','=','beds.building_id')
                    ->where('status',0)
                    ->select('beds.id','beds.name as text','rooms.name as room_name','floors.name as floor_name','buildings.name as building_name')
                    ->get()->toArray();
        return response()->json($beds);
    }

    public function currentBed($hospital_id){
        $bed = Bed::join('rooms','rooms.id','=','beds.room_id')
                    ->join('floors','floors.id','=','beds.floor_id')
                    ->join('buildings','buildings.id','=','beds.building_id')
                    ->join('hospitals','hospitals.bed_id','=','beds.id')
                    ->where('hospitals.id',$hospital_id)
                    ->select('beds.id','beds.name as text','rooms.name as room_name','floors.name as floor_name','buildings.name as building_name')
                    ->first()->toArray();
        return response()->json($bed);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bed = new Bed;
        $bed->name = $request->name;
        $bed->room_id = $request->room_id;
        $bed->floor_id = $request->floor_id;
        $bed->building_id = $request->building_id;
        $bed->user_id = $request->user_id;
        $bed->save();
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
        $bed = Bed::find($id);
        return ApiResponse::success('Success',$bed);
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
        $bed = Bed::find($id);
        $bed->name = $request->name;
        $bed->room_id = $request->room_id;
        $bed->floor_id = $request->floor_id;
        $bed->building_id = $request->building_id;
        $bed->user_id = $request->user_id;
        $bed->save();
        return ApiResponse::success('Success',null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bed::where('id',$id)->delete();
        return 'success';
    }
}
