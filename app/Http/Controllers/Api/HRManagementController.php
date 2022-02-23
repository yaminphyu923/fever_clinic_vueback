<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\HRManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HRManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hrs = HRManagement::with('position')->latest('id')->get();
        return ApiResponse::success('Success',$hrs);
    }

    public function HRData(){
        $hrs = HRManagement::select('id','name as text')->get()->toArray();
        return response()->json($hrs);
    }

    public function hrPaginate(Request $request){
        if($request->search){
            $hrs = HRManagement::with('position')
                    ->join('positions as position','position.id','=','h_r_management.position_id')
                    ->where('position.name','like','%'.$request->search.'%')
                    ->orwhere('h_r_management.name','like','%'.$request->search.'%')
                    ->select('h_r_management.*')
                    ->latest('h_r_management.id')->paginate(10);
            return ApiResponse::success('Success',$hrs);
        }
        else{
            $hrs = HRManagement::with('position')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$hrs);
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
        $hr = new HRManagement;
        $hr->name = $request->name;
        $hr->phone = $request->phone;
        $hr->position_id = $request->position_id;
        $hr->user_id = $request->user_id;
        $hr->save();
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
        $hr = HRManagement::find($id);
        return ApiResponse::success('Success',$hr);
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
        $hr = HRManagement::find($id);
        $hr->name = $request->name;
        $hr->phone = $request->phone;
        $hr->position_id = $request->position_id;
        $hr->user_id = $request->user_id;
        $hr->save();
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
        HRManagement::where('id',$id)->delete();
        return ApiResponse::success('Success',null);
    }
}
