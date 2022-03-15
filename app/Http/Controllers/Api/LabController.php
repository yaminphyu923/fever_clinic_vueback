<?php

namespace App\Http\Controllers\Api;

use App\Models\Lab;
use App\Exports\LabsExport;
use App\Imports\LabsImport;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Lab::latest('id')->get();
        return ApiResponse::success('Success',$labs);
    }

    public function labPaginate(Request $request){
        if($request->search){
            $labs = Lab::with('group','labCategory','user')
            ->where('name','like','%'.$request->search.'%')
            ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$labs);
        }
        else{
            $labs = Lab::with('group','labCategory','user')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$labs);
        }
    }

    public function labGroup(Request $request){
        if($request->search != 'all'){
            $labs = Lab::with('group','labCategory','user');
            // if($request->search != 'all'){
                $labs = $labs->where('group_id','like','%'.$request->search.'%');
            // }

            $labs = $labs->latest('id')->paginate(10);
            return ApiResponse::success('Success',$labs);
        }
        else{
            $labs = Lab::with('group','labCategory','user')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$labs);
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
        $lab = new Lab;
        $lab->name = $request->name;
        $lab->unit = $request->unit;
        $lab->range = $request->range;
        $lab->labcategory_id = $request->labcategory_id;
        $lab->group_id = $request->group_id;
        $lab->user_id = $request->user_id;
        $lab->save();
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
        $lab_category = Lab::find($id);
        return ApiResponse::success('Success',$lab_category);
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
        $lab = Lab::find($id);
        $lab->name = $request->name;
        $lab->unit = $request->unit;
        $lab->range = $request->range;
        $lab->labcategory_id = $request->labcategory_id;
        $lab->group_id = $request->group_id;
        $lab->user_id = $request->user_id;
        $lab->save();
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
        Lab::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }

    public function labExport()
    {
        return Excel::download(new LabsExport, 'labs.xlsx');
        // $excel = Excel::download(new LabsExport, 'labs.xlsx');
        // return ApiResponse::success('Successful',$excel);
    }

    public function importFile(Request $request)
    {
        Excel::import(new LabsImport, $request->file('labFile')->store('temp'));
        return response()->json('success');
    }

    public function sortByName(){
        $labs = Lab::with('group','labCategory','user')->orderBy('name')->paginate(10);
        return ApiResponse::success('Success',$labs);
    }
}
