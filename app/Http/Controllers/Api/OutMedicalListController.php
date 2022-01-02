<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\OutMedical;
use App\Models\MedicalList;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OutMedicalListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $out_medicals = OutMedical::with('user')->with('doctor')->with('medicalList')->latest('id')->get();
        return ApiResponse::success('Successful',$out_medicals);
    }

    public function outMedicalPaginate(Request $request)
    {
        if($request->outSearch){
            $out_medicals = OutMedical::with('user')->with('doctor')->with('medicalList')
                                        ->whereDate('out_date',$request->outSearch)
                                        ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$out_medicals);
        }
        else{
            $out_medicals = OutMedical::with('user')->with('doctor')->with('medicalList')->latest('id')->paginate(10);
            return ApiResponse::success('Successful',$out_medicals);
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
        $this->validate($request,[
            "out_quantity" => "required",
        ]);

        DB::beginTransaction();
        try{
            $out_medical = new OutMedical;
            $out_medical->out_date = $request->out_date;
            $out_medical->out_quantity = $request->out_quantity;
            $out_medical->note = $request->note;
            $out_medical->approve_doctor = $request->approve_doctor;
            $out_medical->medical_list_id = $request->medical_list_id;
            $out_medical->user_id = $request->user_id;
            $out_medical->save();

            $medical = MedicalList::find($request->medical_list_id);
            $medical->name = $medical->name;
            $medical->in_date = $medical->in_date;
            $medical->quantity = $medical->quantity;
            $medical->out_quantity = $request->out_quantity;
            $medical->refill_quantity = $medical->refill_quantity;
            $medical->remain = $medical->remain - $request->out_quantity;
            $medical->medical_category_id = $medical->medical_category_id;
            $medical->note = $medical->note;
            $medical->user_id = $medical->user_id;
            $medical->save();

            DB::commit();
            return ApiResponse::success("Successful",null);
        }catch(\Exception $error){
            DB::rollBack();
            return ApiResponse::fail("Something Wrong",$error->getMessage());
        }

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
