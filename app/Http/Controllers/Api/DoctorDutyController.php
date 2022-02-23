<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\DoctorDuty;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorDutyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor_duties = DoctorDuty::with('time','doctor','user')->orderBy('date','desc')->paginate(10);
        return ApiResponse::success('Success',$doctor_duties);
    }

    public function sortByLatestUpdate(){
        $doctor_duties = DoctorDuty::with('time','doctor','user')->latest('id')->paginate(10);
        return ApiResponse::success('Success',$doctor_duties);
    }

    public function doctorDutyPaginate(Request $request){
        if($request->start_date && $request->end_date){
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            // $endDate = Carbon::parse($endDate)->addDays(1);
            $doctor_duties = DoctorDuty::with('time','doctor','user')->whereBetween('date', [$startDate, $endDate])
                        ->orderBy('date','desc')->paginate(10);
            return ApiResponse::success('Success',$doctor_duties);
        }
        elseif($request->search){
            $doctor_duties = DoctorDuty::with('time','doctor','user')->where('date','like','%'.$request->search.'%')->orderBy('date','desc')->paginate(10);
            return ApiResponse::success('Success',$doctor_duties);
        }
        else{
            $doctor_duties = DoctorDuty::with('time','doctor','user')->orderBy('date','desc')->paginate(10);
            return ApiResponse::success('Success',$doctor_duties);
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
        $doctor_duty = new DoctorDuty;
        $doctor_duty->date = $request->date;
        $doctor_duty->time_id = $request->time_id;
        $doctor_duty->doctor_id = $request->doctor_id;
        $doctor_duty->note = $request->note;
        $doctor_duty->user_id = $request->user_id;
        $doctor_duty->save();
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
        $doctor_duty = DoctorDuty::find($id);
        return ApiResponse::success('Successful',$doctor_duty);
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
        $doctor_duty = DoctorDuty::find($id);
        $doctor_duty->date = $request->date;
        $doctor_duty->time_id = $request->time_id;
        $doctor_duty->doctor_id = $request->doctor_id;
        $doctor_duty->note = $request->note;
        $doctor_duty->user_id = $request->user_id;
        $doctor_duty->save();
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
        DoctorDuty::where('id',$id)->delete();
        return 'success';
    }
}
