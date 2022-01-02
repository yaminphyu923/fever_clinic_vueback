<?php

namespace App\Http\Controllers\Api;

use App\Models\MedicalList;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicalListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical_lists = MedicalList::with('medicalcategory')->latest('id')->get();
        return ApiResponse::success('Successful',$medical_lists);
    }

    public function medicalListPaginate(Request $request){
        if($request->search){
            $medical_lists = MedicalList::with('medicalcategory')->where('name','like','%'.$request->search.'%')
                                        ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$medical_lists);
        }
        else{
            $medical_lists = MedicalList::with('medicalcategory')->latest('id')->paginate(10);
            return ApiResponse::success('Successful',$medical_lists);
        }

    }

    public function medicalListData(){
        $medical_lists = MedicalList::select('id','name as text')->get()->toArray();
        return response()->json($medical_lists);
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
            "name" => "required",
        ]);

        $medical = new MedicalList;
        $medical->name = $request->name;
        $medical->in_date = $request->start_date;
        $medical->quantity = $request->quantity;
        $medical->out_quantity = 0;
        $medical->remain = $request->quantity;
        $medical->medical_category_id = $request->medical_category_id;
        $medical->note = $request->note;
        $medical->user_id = $request->user_id;
        $medical->save();
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
        $medical_list = MedicalList::with('medicalcategory')->findOrFail($id);
        return ApiResponse::success("Successfully",$medical_list);
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
