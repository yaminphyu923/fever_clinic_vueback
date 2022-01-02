<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\MedicalCategory;
use App\Http\Controllers\Controller;

class MedicalCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical_categories = MedicalCategory::latest('id')->get();
        return ApiResponse::success('Successful',$medical_categories);
    }

    public function medicalCategoryData(){
        $medical_categories = MedicalCategory::select('id','name as text')->get()->toArray();
        return response()->json($medical_categories);
    }

    public function medicalCategoryPaginate(Request $request)
    {
        if($request->search){
            $medical_categories = MedicalCategory::where('name','like','%'.$request->search.'%')
                                        ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$medical_categories);
        }
        else{
            $medical_categories = MedicalCategory::latest('id')->paginate(10);
            return ApiResponse::success('Successful',$medical_categories);
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
            "name" => "required",
        ]);

        $medical_category = new MedicalCategory;
        $medical_category->name = $request->name;
        $medical_category->user_id = $request->user_id;
        $medical_category->save();
        return ApiResponse::success("Successful",null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medical_category = MedicalCategory::find($id);
        return ApiResponse::success("Successful",$medical_category);
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
        $medical_category = MedicalCategory::find($id);
        $medical_category->name = $request->name;
        $medical_category->user_id = $request->user_id;
        $medical_category->save();
        return ApiResponse::success("Successful",null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MedicalCategory::where('id',$id)->delete();
        return ApiResponse::success("Successful",null);
    }
}
