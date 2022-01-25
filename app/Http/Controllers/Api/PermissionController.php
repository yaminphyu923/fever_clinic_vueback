<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return ApiResponse::success('Successful',$permissions);
    }

    public function permissionPaginate(Request $request){
        if($request->search){
            $permissions = Permission::where('name','like','%'.$request->search.'%')
                                        ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$permissions);
        }
        else{
            $permissions = Permission::latest('id')->paginate(10);
            return ApiResponse::success('Success',$permissions);
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
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->guard_name = "web";
        $permission->save();

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
        $permission = Permission::find($id);
        return ApiResponse::success('Successful',$permission);
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
        $permission = Permission::find($id);
        $permission->name = $request->name;
        // $permission->guard_name = "web";
        $permission->save();

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
        Permission::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }
}
