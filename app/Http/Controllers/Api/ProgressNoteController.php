<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\ProgressNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ProgressNoteController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file("progress_note")) {
            $file=$request->file("progress_note");
            $filename=time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/progress_notes');
            $file->move($path,$filename);
        }

        $progress = new ProgressNote;
        $progress->patient_id = $request->patient_id;
        $progress->progress_note = $filename;
        $progress->user_id = $request->user_id;
        $progress->save();
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
        //
    }

    public function edit($patient_id,$date){
        $progress_note = ProgressNote::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$progress_note);
    }

    public function progressUpdate(Request $request)
    {
        $progress_note = $request->all();
        $old_data = ProgressNote::where('id',$request->id)->first();
        // if($old_data->progress_note != null){
        //     if(file_exists(public_path('photos/progress_notes/'.$old_data->progress_note))){

        //         unlink('photos/progress_notes/'.$old_data->progress_note);

        //     }
        // }

        // if($request->file("progress_note")) {
        //     $file=$request->file("progress_note");
        //     $filename=time().'_'.$file->getClientOriginalName();
        //     $path=public_path('photos/progress_notes');
        //     $file->move($path,$filename);
        //     $old_data->progress_note = $filename;
        // }

        //     $progress = ProgressNote::where('id',$request->id)->first();
        //     $progress->patient_id = $request->patient_id;

        //     $progress->user_id = $request->user_id;
        //     $progress->save();
        return ApiResponse::success('Successful',$progress_note);
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
        $progress = $request->all();
        // $old_data = ProgressNote::find($id);
        // if($old_data->progress_note != null){
        //     if(file_exists(public_path('photos/progress_notes/'.$old_data->progress_note))){

        //         unlink('photos/progress_notes/'.$old_data->progress_note);

        //     }
        // }

        // if($request->file("progress_note")) {
        //     $file=$request->file("progress_note");
        //     $filename=time().'_'.$file->getClientOriginalName();
        //     $path=public_path('photos/progress_notes');
        //     $file->move($path,$filename);
        //     $progress->progress_note = $filename;
        // }

        //     $progress = ProgressNote::find($id);
        //     $progress->patient_id = $request->patient_id;

        //     $progress->user_id = $request->user_id;
        //     $progress->save();
        return ApiResponse::success('Successful',$progress);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
