<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Investigation;
use Image;
use App\Http\Controllers\Controller;

class InvestigationController extends Controller
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
        $this->validate($request,[
            "patient_id" => "required",
        ]);

            if($request->file("image")) {
                $file=$request->file("image");
                $filename=time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/investigations');
                $img = Image::make($file->path());
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save($path.'/'.$filename);
        }

        // $data = $request->all();
        // return response()->json($data);

        $value = explode(",", $request->value);
        $remark = explode(",", $request->remark);
        $lab_name = explode(",", $request->lab_name);
        $lab_unit = explode(",", $request->lab_unit);
        $lab_range = explode(",", $request->lab_range);
        $group_id = explode(",", $request->group_id);
        $labcategory_id = explode(",", $request->labcategory_id);
        // return response()->json($value);
        for($i=0;$i<count($value);$i++){
            $sql = new Investigation;

            $sql->patient_id =$request->patient_id ;
            $sql->doctor_id = $request->doctor_id ;
            $sql->date_requested = $request->date_requested ;
            $sql->date_analysis = $request->date_analysis ;
            $sql->doctor_test = $request->doctor_test ;
            $sql->queue = $request->queue;
            if($request->hasfile('image')){
                $sql->image = $filename;
            }

            $sql->exam_request = $request->exam_request;
            $sql->note = $request->note;

            $sql->value = $value[$i];

            $sql->remark = $remark[$i];

            $sql->lab_name = $lab_name[$i];

            $sql->lab_unit = $lab_unit[$i];

            $sql->lab_range = $lab_range[$i];

            $sql->group_id = $group_id[$i];

            $sql->labcategory_id = $labcategory_id[$i];


            $sql->user_id = $request->user_id;
            $sql->save();

        }


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
        //
    }

    public function edit($patient_id,$date){
        $investigation = Investigation::with('group','labCategory','user')
                                    ->where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')
                                    ->get();
        return ApiResponse::success('Successful',$investigation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function investigationUpdate(Request $request){

        $investigations = $request->all();
        $invest = Investigation::where('id',$investigations['id'])->first();
        if($invest->image != null){
            if(file_exists(public_path('photos/investigations/'.$invest->image))){

                unlink('photos/investigations/'.$invest->image);
            }
        }

        if($request->file("image")) {
            $file=$request->file("image");
            $filename=time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/investigations/');
            $img = Image::make($file->path());

            $img->resize(300, 300, function ($const) {
            $const->aspectRatio();

        })->save($path.'/'.$filename);

        $invest->image = $filename;
    }

            $invest->patient_id = $investigations['patient_id'];
            $invest->doctor_id = $investigations['doctor_id'];
            $invest->date_requested = $investigations['date_requested'];
            $invest->date_analysis = $investigations['date_analysis'];
            $invest->doctor_test = $investigations['doctor_test'];
            $invest->queue = $investigations['queue'];

            $invest->exam_request = $investigations['exam_request'];
            $invest->note = $investigations['note'];
            $invest->value = $investigations['value'];
            $invest->remark = $investigations['remark'];
            $invest->lab_name = $investigations['lab_name'];
            $invest->lab_unit = $investigations['lab_unit'];
            $invest->lab_range = $investigations['lab_range'];
            $invest->group_id = $investigations['group_id'];
            $invest->labcategory_id = $investigations['labcategory_id'];
            $invest->user_id = $investigations['user_id'];

            $invest->save();

        return ApiResponse::success('Successful',$investigations);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "patient_id" => "required",
        ]);

        $old_data = Investigation::find($id);
        if($old_data->image != null){
            if(file_exists(public_path('photos/investigations/'.$old_data->image))){

                unlink('photos/investigations/'.$old_data->image);

            }
        }

            if($request->file("image")) {
                $file=$request->file("image");
                $filename=time().'_'.$file->getClientOriginalName();
                $path=public_path('photos/investigations');
                $img = Image::make($file->path());
                $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save($path.'/'.$filename);
        }

        // $data = $request->all();
        // return response()->json($data);



        // $value = explode(",", $request->value);
        // $remark = explode(",", $request->remark);
        // $lab_name = explode(",", $request->lab_name);
        // $lab_unit = explode(",", $request->lab_unit);
        // $lab_range = explode(",", $request->lab_range);
        // $group_id = explode(",", $request->group_id);
        // $labcategory_id = explode(",", $request->labcategory_id);

        // for($i=0;$i<count($value);$i++){
        //     $sql = Investigation::find($id);

        //     $sql->patient_id =$request->patient_id ;
        //     $sql->doctor_id = $request->doctor_id ;
        //     $sql->date_requested = $request->date_requested ;
        //     $sql->date_analysis = $request->date_analysis ;
        //     $sql->doctor_test = $request->doctor_test ;
        //     $sql->queue = $request->queue;
        //     if($request->hasfile('image')){
        //         $sql->image = $filename;
        //     }

        //     $sql->exam_request = $request->exam_request;
        //     $sql->note = $request->note;

        //     $sql->value = $value[$i];

        //     $sql->remark = $remark[$i];

        //     $sql->lab_name = $lab_name[$i];

        //     $sql->lab_unit = $lab_unit[$i];

        //     $sql->lab_range = $lab_range[$i];

        //     $sql->group_id = $group_id[$i];

        //     $sql->labcategory_id = $labcategory_id[$i];


        //     $sql->user_id = $request->user_id;
        //     $sql->save();

        // }


        return ApiResponse::success('Success',$investigation);
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

    public function detailInvestigationPrint($patient_id){
        $investigations = Investigation::with('patient','doctor','group','labcategory')
                            ->where('patient_id',$patient_id)
                            ->latest('id')->get();
        return ApiResponse::success('successful',$investigations);
    }
}
