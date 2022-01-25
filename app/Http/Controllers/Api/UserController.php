<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Arr;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $users = User::with('role')
                            ->where('role','<>','superadmin')
                            ->where('status','like',1)
                            ->where('name','like','%'.$request->search.'%')
                            ->orwhere('email','like','%'.$request->search.'%')
                            ->orwhere('sama','like','%'.$request->search.'%')
                            ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$users);
        }
        else{
            $users = User::with('role')
                            ->where('role','<>','superadmin')
                            ->where('status','like',1)
                            ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$users);
        }
    }

    public function newly(Request $request)
    {
        if($request->search){
            $users = User::with('role')
                            ->where('role','<>','superadmin')
                            ->where('status','like',0)
                            ->where('name','like','%'.$request->search.'%')
                            ->orwhere('email','like','%'.$request->search.'%')
                            ->orwhere('sama','like','%'.$request->search.'%')
                            ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$users);
        }
        else{
            $users = User::with('role')
                            ->where('role','<>','superadmin')
                            ->where('status','like',0)
                            ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$users);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($request->password == $request->confirm_password){
        $sql = new User;
        $sql->name = $request->name;
        $sql->email = $request->email;
        $sql->password = Hash::make($request->password);
        $sql->sama = $request->sama;
        $sql->role = $request->role;
        $sql->status = 1;
        $sql->save();
        $sql->assignRole($request->input('role'));
        return ApiResponse::success('Successful',null);
        }
        return ApiResponse::fail('Password Invalid!',null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return ApiResponse::success('Successful',$user);
    }

    public function getAuth($id)
    {
        $user = User::find($id);
        $role = Role::find($user->role);
        $permissions = Permission::join('role_has_permissions as rp','rp.permission_id','=','permissions.id')
                                ->where('rp.role_id',$role->id)
                                ->select('permissions.*')
                                ->get();
        return response()->json([
            'user' => $user,
            'role' => $role,
            'permissions' => $permissions,
        ]);
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
        // $sql = User::find($id);
        // $sql->name = $request->name;
        // $sql->email = $request->email;
        // $sql->password = Hash::make($request->password);
        // $sql->sama = $request->sama;
        // $sql->role = $request->role;
        // $sql->status = $sql->status;
        // $sql->save();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'role' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('role'));


        return ApiResponse::success('Successful',null);
    }

    public function newlyUpdate($id){
        $sql = User::find($id);
        // $sql->name = $sql->name;
        // $sql->email = $sql->email;
        // $sql->password = $sql->password;
        // $sql->sama = $sql->sama;
        // $sql->role = $sql->role;
        $sql->status = 1;
        $sql->save();
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
        User::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }
}
