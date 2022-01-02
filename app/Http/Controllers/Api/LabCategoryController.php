<?php

namespace App\Http\Controllers\Api;

use App\Models\LabCategory;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab_categories = LabCategory::latest('id')->get();
        return ApiResponse::success('Success',$lab_categories);
    }

    public function labCategoryPaginate(Request $request){
        if($request->search){
            $lab_categories = LabCategory::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$lab_categories);
        }
        else{
            $lab_categories = LabCategory::latest('id')->paginate(10);
            return ApiResponse::success('Success',$lab_categories);
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
        $lab_category = new LabCategory;
        $lab_category->name = $request->name;
        $lab_category->user_id = $request->user_id;
        $lab_category->save();
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
        $lab_categories = LabCategory::find($id);
        return ApiResponse::success('Success',$lab_categories);
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
        $lab_category = LabCategory::find($id);
        $lab_category->name = $request->name;
        $lab_category->user_id = $request->user_id;
        $lab_category->save();
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
        LabCategory::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }
}
