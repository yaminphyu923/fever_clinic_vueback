<?php

namespace App\Http\Controllers\Api;

use App\Models\MedicalList;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\RefillMedical;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RefillMedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refills = RefillMedical::with('user')->with('doctor')->with('medicalList')->latest('id')->get();
        return ApiResponse::success('Successful',$refills);
    }

    public function refillPaginate(Request $request)
    {
        if($request->search){
            $refills = RefillMedical::with('user')->with('doctor')->with('medicalList')
                                        ->whereDate('refill_date',$request->search)
                                        ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$refills);
        }
        else{
            $refills = RefillMedical::with('user')->with('doctor')->with('medicalList')->latest('id')->paginate(10);
            return ApiResponse::success('Successful',$refills);
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
            "refill_quantity" => "required",
        ]);

        DB::beginTransaction();
        try{
            $refill = new RefillMedical;
            $refill->refill_date = $request->refill_date;
            $refill->refill_quantity = $request->refill_quantity;
            $refill->note = $request->note;
            $refill->doctor_id = $request->doctor_id;
            $refill->medical_list_id = $request->medical_list_id;
            $refill->user_id = $request->user_id;
            $refill->save();

            $medical = MedicalList::find($request->medical_list_id);
            $medical->name = $medical->name;
            $medical->in_date = $medical->in_date;
            $medical->quantity = $medical->quantity;
            $medical->out_quantity = $medical->out_quantity;
            $medical->refill_quantity = $request->refill_quantity;
            $medical->remain = $medical->remain + $request->refill_quantity;
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
