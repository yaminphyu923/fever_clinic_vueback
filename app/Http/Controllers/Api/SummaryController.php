<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Summary;
use App\Models\Building;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $summaries = Summary::with('bed','room','floor','building','user')
                            ->where('date','like','%'.$request->search.'%')
                            ->latest('id')->paginate(10);
            $buildings = Building::all();
            $floors = Floor::all();
            $rooms = Room::all();
            return ApiResponse::success('Success',[
                'summaries' => $summaries,
                'buildings' => $buildings,
                'floors' => $floors,
                'rooms' => $rooms,
            ]);
        }
        else{
            $summaries = Summary::with('bed','room','floor','building','user')->latest('id')->paginate(10);
            $buildings = Building::all();
            $floors = Floor::all();
            $rooms = Room::all();
            return ApiResponse::success('Success',[
                'summaries' => $summaries,
                'buildings' => $buildings,
                'floors' => $floors,
                'rooms' => $rooms,
            ]);
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
        //
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
