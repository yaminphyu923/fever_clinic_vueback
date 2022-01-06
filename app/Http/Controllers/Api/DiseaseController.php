<?php

namespace App\Http\Controllers\Api;

use App\Models\Disease;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = Disease::latest('id')->get();
        return ApiResponse::success('Successful',$diseases);
    }

    public function diseaseData(){
        $diseases = Disease::select('id','name as text')->get()->toArray();
        return response()->json($diseases);
    }

    public function diseasePaginate(Request $request){

        if($request->search){
            $diseases = Disease::where('name','like','%'.$request->search.'%')
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Successful',$diseases);
        }
        $diseases = Disease::latest('id')->paginate(10);
        return ApiResponse::success('Successful',$diseases);
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

        $disease = new Disease;
        $disease->name = $request->name;
        $disease->code = $request->code;
        $disease->category = $request->category;
        $disease->user_id = $request->user_id;
        $disease->save();
        return ApiResponse::success('Successful',null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disease = Disease::find($id);
        return ApiResponse::success('Successful',$disease);
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
        $this->validate($request,[
            "name" => "required",
        ]);

        $disease = Disease::find($id);
        $disease->name = $request->name;
        $disease->code = $request->code;
        $disease->category = $request->category;
        $disease->user_id = $request->user_id;
        $disease->save();
        return ApiResponse::success('Successful',null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disease::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }
}
