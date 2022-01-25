<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Patient;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Exports\PatientsExport;
use App\Imports\PatientsImport;
use App\Exports\InPatientsExport;
use App\Exports\OutPatientsExport;
use App\Exports\ComoPatientsExport;
use App\Exports\DeadPatientsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReferralPatientsExport;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::with('user')->latest('id')->get();
        return ApiResponse::success('success',$patients);
    }

    public function patientData(){
        $patients = Patient::select('id','nrc as text')->get()->toArray();
        return response()->json($patients);
    }

    public function patientPaginate(Request $request){
        if($request->search){
            $patients = Patient::with('user')
                                ->where('name','like','%'.$request->search.'%')
                                ->orwhere('nrc','like','%'.$request->search.'%')
                                ->orwhere('phone','like','%'.$request->search.'%')
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
        elseif($request->startDate && $request->endDate){
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $endDate = Carbon::parse($endDate)->addDays(1);
            $patients = Patient::whereBetween('created_at', [$startDate, $endDate])
                        ->paginate(10);

            return ApiResponse::success('Successful',$patients);
            }
        else{
            $patients = Patient::with('user')->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
    }

    public function editHistory(Request $request)
    {
        if($request->search){
            $patients = Patient::with('user')
                                ->where('name','like','%'.$request->search.'%')
                                ->orwhere('nrc','like','%'.$request->search.'%')
                                ->orwhere('phone','like','%'.$request->search.'%')
                                ->latest('id')->get();
            $patients = $patients->filter(function ($item) {
                return $item->edit_history == 1;
            });
            $patients = $this->paginate($patients);
            return ApiResponse::success('Success',$patients);
        }
        else{
            $patients = Patient::with('user')
                                ->where('edit_history',1)
                                // ->where('created_at','!=','updated_at')
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient;
        $patient->name = $request->name;
        $patient->gender = $request->gender;
        $patient->age = $request->age;
        $patient->dob = $request->dob;
        $patient->nrc = $request->nrc;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->nextKin = $request->nextKin;
        $patient->attendent = $request->attendent;
        $patient->occupation = $request->occupation;
        $patient->symptoms = $request->symptoms;
        $patient->travelHistory = $request->travelHistory;
        $patient->remark = $request->remark;
        $patient->date = $request->date;
        $patient->user_id = $request->user_id;
        $patient->save();

        return ApiResponse::success('success',null);
    }

    public function homeDeadStore(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->dead = $request->dead;
        $patient->dead_date = $request->dead_date;
        $patient->save();

        return ApiResponse::success('success',null);
    }

    public function homeOutStore(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->out_patient = $request->out_patient;
        $patient->out_date = $request->out_date;
        $patient->save();

        return ApiResponse::success('success',null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return ApiResponse::success('Successfully',$patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $patient = Patient::find($id);
        $patient->name = $request->name;
        $patient->gender = $request->gender;
        $patient->age = $request->age;
        $patient->dob = $request->dob;
        $patient->nrc = $request->nrc;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->nextKin = $request->nextKin;
        $patient->attendent = $request->attendent;
        $patient->occupation = $request->occupation;
        $patient->symptoms = $request->symptoms;
        $patient->travelHistory = $request->travelHistory;
        $patient->remark = $request->remark;
        $patient->date = $request->date;
        $patient->user_id = $request->user_id;
        $patient->save();

        return ApiResponse::success('success',null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::where('id',$id)->delete();
        return ApiResponse::success('Successful',null);
    }

    public function totalPatientExport()
    {
        return Excel::download(new PatientsExport, 'total_patient.xlsx');
    }

    public function totalPatientImport(Request $request)
    {
        Excel::import(new PatientsImport, $request->file('patientFile')->store('temp'));
        return back();
    }

    public function searchTotalDate(Request $request){
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $endDate = Carbon::parse($endDate)->addDays(1);
        $patient = Patient::whereBetween('created_at', [$startDate, $endDate])
                    ->get();

        return ApiResponse::success('Successful',$endDate);
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
        {
            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }


    public function inPatientPaginate(Request $request){
        if($request->search){



            $patients = Patient::with('user')
                                ->where('name','like','%'.$request->search.'%')
                                ->orwhere('nrc','like','%'.$request->search.'%')
                                ->orwhere('phone','like','%'.$request->search.'%')
                                // ->where('dead','!=',1)
                                // ->whereNull(['out_patient','out_date','dead','dead_date'])
                                ->latest('id')->get();


        $patients = $patients->filter(function ($item) {
            return $item->dead == null;
        });
        $patients = $this->paginate($patients);
            return ApiResponse::success('Success',$patients);
        }
        elseif($request->startDate && $request->endDate){
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $endDate = Carbon::parse($endDate)->addDays(1);
            $patients = Patient::whereBetween('created_at', [$startDate, $endDate])
                                ->latest('id')->get();

            $patients = $patients->filter(function ($item) {
                return $item->dead == null;
            });
            $patients = $this->paginate($patients);

            return ApiResponse::success('Successful',$patients);
            }
        else{
            $patients = Patient::with('user')
                                ->whereNull(['out_patient','out_date','dead','dead_date'])
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
    }

    public function outPatientPaginate(Request $request){
        if($request->search){
            $patients = Patient::with('user')
                                ->where('name','like','%'.$request->search.'%')
                                ->orwhere('nrc','like','%'.$request->search.'%')
                                ->orwhere('phone','like','%'.$request->search.'%')
                                ->latest('id')->get();
            $patients = $patients->filter(function ($item) {
                return $item->out_patient != null || $item->out_date != null;
            });
            $patients = $this->paginate($patients);
            return ApiResponse::success('Success',$patients);
        }
        elseif($request->startDate && $request->endDate){
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $endDate = Carbon::parse($endDate)->addDays(1);
            $patients = Patient::whereBetween('created_at', [$startDate, $endDate])
                        ->latest('id')->get();

            $patients = $patients->filter(function ($item) {
                return $item->out_patient != null || $item->out_date != null;
            });
            $patients = $this->paginate($patients);

            return ApiResponse::success('Successful',$patients);
            }
        else{
            $patients = Patient::with('user')
                                ->whereNotNull('out_patient')
                                ->orWhereNotNull('out_date')
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
    }


    public function deadPatientPaginate(Request $request){
        if($request->search){
            $patients = Patient::with('user')
                                ->where('name','like','%'.$request->search.'%')
                                ->orwhere('nrc','like','%'.$request->search.'%')
                                ->orwhere('phone','like','%'.$request->search.'%')
                                ->latest('id')->get();
            $patients = $patients->filter(function ($item) {
                return $item->dead != null || $item->dead_date != null;
            });
            $patients = $this->paginate($patients);
            return ApiResponse::success('Success',$patients);
        }
        elseif($request->startDate && $request->endDate){
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $endDate = Carbon::parse($endDate)->addDays(1);
            $patients = Patient::whereBetween('created_at', [$startDate, $endDate])
                        ->latest('id')->get();
            $patients = $patients->filter(function ($item) {
                return $item->dead != null;
            });
            $patients = $this->paginate($patients);

            return ApiResponse::success('Successful',$patients);
            }
        else{
            $patients = Patient::with('user')
                                ->orWhereNotNull('dead')
                                ->orWhereNotNull('dead_date')
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
    }

    public function comoPatientPaginate(Request $request){
        if($request->search){
            $patients = Patient::with('user')
                                ->where('name','like','%'.$request->search.'%')
                                ->orwhere('nrc','like','%'.$request->search.'%')
                                ->orwhere('phone','like','%'.$request->search.'%')
                                ->latest('id')->get();

            $patients = $patients->filter(function ($item) {
                return $item->como != null || $item->comobidity != null;
            });
            $patients = $this->paginate($patients);
            return ApiResponse::success('Success',$patients);
        }
        elseif($request->startDate && $request->endDate){
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $endDate = Carbon::parse($endDate)->addDays(1);
            $patients = Patient::whereBetween('created_at', [$startDate, $endDate])
                        ->latest('id')->get();
            $patients = $patients->filter(function ($item) {
                return $item->como != null || $item->comobidity != null;
            });
            $patients = $this->paginate($patients);

            return ApiResponse::success('Successful',$patients);
            }
        else{
            $patients = Patient::with('user')
                                ->orWhereNotNull('como')
                                ->orWhereNotNull('comobidity')
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
    }

    public function referralPatientPaginate(Request $request){
        if($request->search){
            $patients = Patient::with('user')
                                ->where('name','like','%'.$request->search.'%')
                                ->orwhere('nrc','like','%'.$request->search.'%')
                                ->latest('id')->get();
            $patients = $patients->filter(function ($item) {
                return $item->refer != null;
            });
            $patients = $this->paginate($patients);
            return ApiResponse::success('Success',$patients);
        }
        elseif($request->startDate && $request->endDate){
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $endDate = Carbon::parse($endDate)->addDays(1);
            $patients = Patient::whereBetween('created_at', [$startDate, $endDate])
                        ->latest('id')->get();

            $patients = $patients->filter(function ($item) {
                return $item->refer != null;
            });
            $patients = $this->paginate($patients);

            return ApiResponse::success('Successful',$patients);
            }
        else{
            $patients = Patient::with('user')
                                ->whereNotNull('refer')
                                ->latest('id')->paginate(10);
            return ApiResponse::success('Success',$patients);
        }
    }


    public function inPatientExport()
    {
        return Excel::download(new InPatientsExport, 'in_patient.xlsx');
    }

    public function outPatientExport()
    {
        return Excel::download(new OutPatientsExport, 'out_patient.xlsx');
    }

    public function deadPatientExport()
    {
        return Excel::download(new DeadPatientsExport, 'dead_patient.xlsx');
    }

    public function comoPatientExport()
    {
        return Excel::download(new ComoPatientsExport, 'como_patient.xlsx');
    }

    public function referralPatientExport()
    {
        return Excel::download(new ReferralPatientsExport, 'referral_patient.xlsx');
    }

}
