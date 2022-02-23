<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\HRDuty;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HRDutyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hr_duties = HRDuty::with('time','hrManagement','user')->orderBy('date','desc')->paginate(10);
        return ApiResponse::success('Success',$hr_duties);
    }

    public function sortByLatestUpdate(){
        $hr_duties = HRDuty::with('time','hrManagement','user')->latest('id')->paginate(10);
        return ApiResponse::success('Success',$hr_duties);
    }

    public function hrDutyPaginate(Request $request){
        if($request->start_date && $request->end_date){
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            // $endDate = Carbon::parse($endDate)->addDays(1);
            $hr_duties = HRDuty::with('time','hrManagement','user')->whereBetween('date', [$startDate, $endDate])
                        ->orderBy('date','desc')->paginate(10);
            return ApiResponse::success('Success',$hr_duties);
        }
        elseif($request->search){
            $hr_duties = HRDuty::with('time','hrManagement','user')->where('date','like','%'.$request->search.'%')->orderBy('date','desc')->paginate(10);
            return ApiResponse::success('Success',$hr_duties);
        }
        else{
            $hr_duties = HRDuty::with('time','hrManagement','user')->orderBy('date','desc')->paginate(10);
            return ApiResponse::success('Success',$hr_duties);
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
        $hr_duty = new HRDuty;
        $hr_duty->date = $request->date;
        $hr_duty->time_id = $request->time_id;
        $hr_duty->h_r_management_id = $request->h_r_management_id;
        $hr_duty->note = $request->note;
        $hr_duty->user_id = $request->user_id;
        $hr_duty->save();
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
        $hr_duty = HRDuty::find($id);
        return ApiResponse::success('Successful',$hr_duty);
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
        $hr_duty = HRDuty::find($id);
        $hr_duty->date = $request->date;
        $hr_duty->time_id = $request->time_id;
        $hr_duty->h_r_management_id = $request->h_r_management_id;
        $hr_duty->note = $request->note;
        $hr_duty->user_id = $request->user_id;
        $hr_duty->save();
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
        HRDuty::where('id',$id)->delete();
        return 'success';
    }

}
