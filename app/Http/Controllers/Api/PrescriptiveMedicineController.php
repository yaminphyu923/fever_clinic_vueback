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

    public function prescriptiveMedicinePaginate(Request $request)
    {
        if($request->search){
            $pres = PrescriptiveMedicine::with('patient')->with('user')->with('doctor')->with('medicalList')
                                        ->join('patients as patient','patient.id','=','prescriptive_medicines.patient_id')
                                        ->join('medical_lists as medical','medical.id','=','prescriptive_medicines.medical_list_id')
                                        ->join('doctors as doctor','doctor.id','=','prescriptive_medicines.doctor_id')
                                        ->where('patient.name','like','%'.$request->search.'%')
                                        ->orWhere('medical.name','like','%'.$request->search.'%')
                                        ->orWhere('doctor.name','like','%'.$request->search.'%')
                                        ->where('prescriptive_medicines.status','like',0)
                                        ->select('prescriptive_medicines.*')
                                        ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$pres);
        }
        else{
            $pres = PrescriptiveMedicine::with('patient')->with('user')->with('doctor')->with('medicalList')
                    ->where('status','like',0)
                    ->latest('id')->paginate(10);
            return ApiResponse::success('Successful',$pres);
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
        $pre = PrescriptiveMedicine::find($id);
        $pre->date = $pre->date;
        $pre->patient_id = $pre->patient_id;
        $pre->doctor_id = $pre->doctor_id;
        $pre->medical_list_id = $pre->medical_list_id;
        $pre->status = 1;
        $pre->user_id = $pre->user_id;
        $pre->save();

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
