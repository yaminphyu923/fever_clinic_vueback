<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return ApiResponse::success('Success',$rooms);
    }

    public function roomPaginate(Request $request){
        if($request->search){
            $rooms = Room::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$rooms);
        }
        else{
            $rooms = Room::latest('id')->paginate(10);
            return ApiResponse::success('Success',$rooms);
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
        $room = new Room;
        $room->name = $request->name;
        $room->user_id = $request->user_id;
        $room->save();
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
        $room = Room::find($id);
        return ApiResponse::success('Successful',$room);
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
        $room = Room::find($id);
        $room->name = $request->name;
        $room->user_id = $request->user_id;
        $room->save();
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
        Room::where('id',$id)->delete();
        return 'success';
    }
}
