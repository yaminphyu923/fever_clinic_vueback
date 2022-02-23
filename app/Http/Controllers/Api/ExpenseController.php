<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Remain;
use App\Models\Expense;
use App\Models\Donation;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function expensePaginate(Request $request){
        if($request->start_date && $request->end_date){
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            $endDate = Carbon::parse($endDate)->addDays(1);
            $expenses = Expense::whereBetween('date', [$startDate, $endDate])
                        ->orderBy('date','desc')->paginate(10);
            return ApiResponse::success('Success',$expenses);
        }
        elseif($request->search){
            $expenses = Expense::where('date','like','%'.$request->search.'%')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$expenses);
        }
        else{
            $expenses = Expense::latest('id')->paginate(10);
            return ApiResponse::success('Success',$expenses);
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
        $expense = new Expense;
        $expense->date = $request->date;
        $expense->amount = $request->amount;
        $expense->note = $request->note;
        $expense->user_id = $request->user_id;
        $expense->save();

        $donations = Donation::sum('price');

        if($request->amount){
            $remain = new Remain;
            $remain->date = $request->date;
            $remain->remain = $donations - $request->amount;
            $remain->withdraw = $request->amount;
            $remain->note = $request->note;
            $remain->user_id = $request->user_id;
            $remain->save();
        }
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
        Expense::where('id',$id)->delete();
        return 'success';
    }
}
