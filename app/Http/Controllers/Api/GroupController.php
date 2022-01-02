<?php

namespace App\Http\Controllers\Api;

use App\Models\Group;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::latest('id')->get();
        return ApiResponse::success('Successful',$groups);
    }

    public function groupPaginate(Request $request){
        if($request->search){
            $groups = Group::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$groups);
        }
        else{
            $groups = Group::latest('id')->paginate(10);
            return ApiResponse::success('Success',$groups);
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
        $group = new Group;
        $group->name = $request->name;
        $group->user_id = $request->user_id;
        $group->save();
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
        $groups = Group::find($id);
        return ApiResponse::success('Successful',$groups);
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
        $group = Group::find($id);
        $group->name = $request->name;
        $group->user_id = $request->user_id;
        $group->save();
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
        Group::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }
}
