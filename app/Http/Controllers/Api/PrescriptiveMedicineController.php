<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PrescriptiveMedicine;

class PrescriptiveMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pres = PrescriptiveMedicine::with('patient')->with('user')->with('doctor')->with('medicalList')->latest('id')->get();
        return ApiResponse::success('Successful',$pres);
    }

    public function prescriptiveMedicinePaginate()
    {
        // if($request->search){
        //     $pres = PrescriptiveMedicine::with('patient')->with('user')->with('doctor')->with('medicalList')
        //                                 ->whereDate('refill_date',$request->search)
        //                                 ->latest('id')->paginate(10);
        //     return ApiResponse::success('Success',$pres);
        // }
        // else{
            $pres = PrescriptiveMedicine::with('patient')->with('user')->with('doctor')->with('medicalList')->latest('id')->paginate(1);
            return ApiResponse::success('Successful',$pres);
        // }
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
