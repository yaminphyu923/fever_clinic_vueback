<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Donation;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::sum('price');
        return ApiResponse::success('Success',$donations);
    }

    public function donationPaginate(Request $request){
        if($request->start_date && $request->end_date){
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $donations = Donation::whereBetween('date', [$startDate, $endDate])
                        ->orderBy('date','desc')->paginate(10);
            return ApiResponse::success('Success',$donations);
        }
        elseif($request->search){
            $donations = Donation::where('name','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$donations);
        }
        else{
            $donations = Donation::latest('id')->paginate(10);
            return ApiResponse::success('Success',$donations);
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
        $donation = new Donation;
        $donation->date = $request->date;
        $donation->name = $request->name;
        $donation->price = $request->price;
        $donation->item = $request->item;
        $donation->user_id = $request->user_id;
        $donation->save();
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
        //
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
        Donation::where('id',$id)->delete();
        return 'success';
    }
}
