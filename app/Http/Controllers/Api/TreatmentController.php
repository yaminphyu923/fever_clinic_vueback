<?php

namespace App\Http\Controllers\Api;

use App\Models\Treatment;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PrescriptiveMedicine;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            for($i=0;$i <= count(array($request->get('medical_list_id')));$i++){
                $sql = new Treatment;
                $sql->patient_id = $request->patient_id;
                $sql->note = $request->note;
                $sql->doctor_id = $request->doctor_id;
                $sql->pharmacy = $request->pharmacy;
                $sql->pre_date = $request->pre_date;
                $sql->queue = $request->queue;
                $sql->medical_list_id = $request->get('medical_list_id')[$i];
                $sql->dose = $request->get('dose')[$i];
                $sql->frequency = $request->get('frequency')[$i];
                $sql->start_date = $request->get('start_date')[$i];
                $sql->end_date = $request->get('end_date')[$i];
                $sql->remark = $request->get('remark')[$i];
                $sql->user_id = $request->user_id;
                $sql->save();

                $pre = new PrescriptiveMedicine;
                $pre->date = $request->pre_date;
                $pre->patient_id = $request->patient_id;
                $pre->doctor_id = $request->doctor_id;
                $pre->medical_list_id = $request->get('medical_list_id')[$i];
                $pre->status = 0;
                $pre->user_id = $request->user_id;
                $pre->save();

            }
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

    }

    public function edit($patient_id,$date){
        $treatment = Treatment::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')
                                    ->get();


        $medicine = PrescriptiveMedicine::where('patient_id',$patient_id)
                                        ->where('created_at','like',$date.'%')
                                        ->latest('patient_id')
                                        ->select('id')
                                        ->get();

        foreach($treatment as $key=>$tre){
            $tre->medicine_id = $medicine[$key]['id'];
        }

        return ApiResponse::success('Successful',$treatment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function treatmentUpdate(Request $request)
    {

        DB::beginTransaction();
        try{
            $treatments = $request->all();
            // foreach ($request->all() as $data){
                $additional['patient_id'] = $treatments['patient_id'];
                $additional['note'] = $treatments['note'];
                $additional['doctor_id'] = $treatments['doctor_id'];
                $additional['pharmacy'] = $treatments['pharmacy'];
                $additional['pre_date'] = $treatments['pre_date'];
                $additional['queue'] = $treatments['queue'];
                $additional['medical_list_id'] = $treatments['medical_list_id'];
                $additional['dose'] = $treatments['dose'];
                $additional['frequency'] = $treatments['frequency'];
                $additional['start_date'] = $treatments['start_date'];
                $additional['end_date'] = $treatments['end_date'];
                $additional['remark'] = $treatments['remark'];
                $additional['user_id'] = $treatments['user_id'];

                $update_additional = Treatment::where('id',$treatments['id'])->update($additional);


                $pre = PrescriptiveMedicine::where('id',$treatments['medical_list_id'])
                                            ->first();

                if($pre){

                $pre->patient_id = $treatments['patient_id'];

                $pre->medical_list_id = $treatments['medical_list_id'];

                $pre->save();
                }
            // }
            DB::commit();
            return ApiResponse::success("Successful",$treatments);

            // return response()->json($request->all());

            // // $pre = PrescriptiveMedicine::where('medical_list_id',$request->medical_list_id);
            // // $pre->date = $request->pre_date;
            // // $pre->patient_id = $request->patient_id;
            // // $pre->doctor_id = $request->doctor_id;
            // // $pre->medical_list_id = $request->get('medical_list_id')[$i];
            // // $pre->status = 0;
            // // $pre->user_id = $request->user_id;
            // // $pre->save();


            // DB::commit();

            // return response()->json($data[0]['medical_list_id']);


        }catch(\Exception $error){
            DB::rollBack();
            return ApiResponse::fail("Something Wrong",$error->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{

            $arrID = [];
            if(isset($request['medical_list_id'])){
                if(count($request['medical_list_id']) > 0){
                    for($i=0;$i<count($request['medical_list_id']);$i++){
                        $additional['patient_id'] = $request->patient_id;
                        $additional['note'] = $request->note;
                        $additional['doctor_id'] = $request->doctor_id;
                        $additional['pharmacy'] = $request->pharmacy;
                        $additional['pre_date'] = $request->pre_date;
                        $additional['queue'] = $request->queue;
                        $additional['medical_list_id'] = $request->get('medical_list_id')[$i];
                        $additional['dose'] = $request->get('dose')[$i];
                        $additional['frequency'] = $request->get('frequency')[$i];
                        $additional['start_date'] = $request->get('start_date')[$i];
                        $additional['end_date'] = $request->get('end_date')[$i];
                        $additional['remark'] = $request->get('remark')[$i];
                        $additional['user_id'] = $request->user_id;

                        $update_additional = Treatment::update($additional);
                    }
                }


            }


            $pre = PrescriptiveMedicine::where('medical_list_id',$request->medical_list_id);
            $pre->date = $request->pre_date;
            $pre->patient_id = $request->patient_id;
            $pre->doctor_id = $request->doctor_id;
            $pre->medical_list_id = $request->get('medical_list_id')[$i];
            $pre->status = 0;
            $pre->user_id = $request->user_id;
            $pre->save();


            DB::commit();
            return ApiResponse::success("Successful",null);

        }catch(\Exception $error){
            DB::rollBack();
            return ApiResponse::fail("Something Wrong",$error->getMessage());
        }
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

    public function detailTreatmentPrint($patient_id){
        $treatments = Treatment::with('patient','doctor','medicalList')
                            ->where('patient_id',$patient_id)
                            ->latest('id')->get();
        return ApiResponse::success('successful',$treatments);
    }
}
