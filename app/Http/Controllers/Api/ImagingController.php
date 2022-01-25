<?php

namespace App\Http\Controllers\Api;

use Image;
use App\Models\Imaging;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagingController extends Controller
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
        // if($request->hasFile("image1"))
        // {
        //     $file=$request->file("image1");
        //     $filename1=uniqid('bg').$file->getClientOriginalName();
        //     $path=public_path('photos/imagings/');
        //     $img = Image::make($file->path());
        //     $img->resize(300, 300, function ($const) {
        //         $const->aspectRatio();
        //     })->save($path.'/'.$filename1);
        // }
        $imaging = new Imaging;
        if($request->file("image1")) {
            $file=$request->file("image1");
            $filename1=time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/imagings/imaging_one');
            $img = Image::make($file->path());
            $img->resize(300, 300, function ($const) {
            $const->aspectRatio();
        })->save($path.'/'.$filename1);
            // $file_name = time().'_'.$request->image1->getClientOriginalName();
            // $file_path = $request->file('image1')->storeAs('photos/imagings', $file_name, 'public');

            // $imaging->image1 = time().'_'.$request->image1->getClientOriginalName();
        }

        if($request->file("image2")) {
            $file=$request->file("image2");
            $filename2=time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/imagings/imaging_two');
            $img = Image::make($file->path());
            $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save($path.'/'.$filename2);
        }

        if($request->file("image3")) {
            $file=$request->file("image3");
            $filename3=time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/imagings/imaging_three');
            $img = Image::make($file->path());
            $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save($path.'/'.$filename3);
        }

        if($request->file("image4")) {
            $file=$request->file("image4");
            $filename4=time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/imagings/imaging_four');
            $img = Image::make($file->path());
            $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save($path.'/'.$filename4);
        }

        if($request->file("image5")) {
            $file=$request->file("image5");
            $filename5=time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/imagings/imaging_five');
            $img = Image::make($file->path());
            $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save($path.'/'.$filename5);
        }

        if($request->file("image6")) {
            $file=$request->file("image6");
            $filename6=time().'_'.$file->getClientOriginalName();
            $path=public_path('photos/imagings/imaging_six');
            $img = Image::make($file->path());
            $img->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save($path.'/'.$filename6);
        }

        $imaging->patient_id = $request->patient_id;
        $imaging->doctor_id = $request->doctor_id;
        $imaging->date_requested = $request->date_requested;
        $imaging->date_analysis = $request->date_analysis;
        if($request->hasfile('image1')){
            $imaging->image1 = $filename1;
        }
        if($request->hasfile('image2')){
            $imaging->image2 = $filename2;
        }
        if($request->hasfile('image3')){
            $imaging->image3 = $filename3;
        }
        if($request->hasfile('image4')){
            $imaging->image4 = $filename4;
        }
        if($request->hasfile('image5')){
            $imaging->image5 = $filename5;
        }
        if($request->hasfile('image6')){
            $imaging->image6 = $filename6;
        }

        $imaging->analysis = $request->analysis;
        $imaging->conclusion = $request->conclusion;
        $imaging->user_id = $request->user_id;
        $imaging->save();

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

    public function edit($patient_id,$date){
        $imaging = Imaging::where('patient_id',$patient_id)
                                    ->where('created_at','like',$date.'%')
                                    ->latest('patient_id')->first();
        return ApiResponse::success('Successful',$imaging);
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
        // $old_data = Imaging::find($id);
        // if($old_data->image1 != null){
        //     if(file_exists(public_path('photos/imagings/imaging_one/'.$old_data->image1))){

        //         unlink('photos/imagings/imaging_one/'.$old_data->image1);

        //     }
        // }
        // if($old_data->image2 != null){
        //     if(file_exists(public_path('photos/imagings/imaging_two/'.$old_data->image2))){

        //         unlink('photos/imagings/imaging_two/'.$old_data->image2);

        //     }
        // }
        // if($old_data->image3 != null){
        //     if(file_exists(public_path('photos/imagings/imaging_three/'.$old_data->image3))){

        //         unlink('photos/imagings/imaging_three/'.$old_data->image3);

        //     }
        // }
        // if($old_data->image4 != null){
        //     if(file_exists(public_path('photos/imagings/imaging_four/'.$old_data->image4))){

        //         unlink('photos/imagings/imaging_four/'.$old_data->image4);

        //     }
        // }
        // if($old_data->image5 != null){
        //     if(file_exists(public_path('photos/imagings/imaging_five/'.$old_data->image5))){

        //         unlink('photos/imagings/imaging_five/'.$old_data->image5);

        //     }
        // }
        // if($old_data->image6 != null){
        //     if(file_exists(public_path('photos/imagings/imaging_six/'.$old_data->image6))){

        //         unlink('photos/imagings/imaging_six/'.$old_data->image6);

        //     }
        // }

        // if($request->file("image1")) {
        //     $file=$request->file("image1");
        //     $filename1=time().'_'.$file->getClientOriginalName();
        //     $path=public_path('photos/imagings/imaging_one');
        //     $img = Image::make($file->path());
        //     $img->resize(300, 300, function ($const) {
        //     $const->aspectRatio();
        // })->save($path.'/'.$filename1);
        //     $old_data->image1 = $filename1;
        // }

        // if($request->file("image2")) {
        //     $file=$request->file("image2");
        //     $filename2=time().'_'.$file->getClientOriginalName();
        //     $path=public_path('photos/imagings/imaging_two');
        //     $img = Image::make($file->path());
        //     $img->resize(300, 300, function ($const) {
        //         $const->aspectRatio();
        //     })->save($path.'/'.$filename2);
        //     $old_data->image2 = $filename2;
        // }

        // if($request->file("image3")) {
        //     $file=$request->file("image3");
        //     $filename3=time().'_'.$file->getClientOriginalName();
        //     $path=public_path('photos/imagings/imaging_three');
        //     $img = Image::make($file->path());
        //     $img->resize(300, 300, function ($const) {
        //         $const->aspectRatio();
        //     })->save($path.'/'.$filename3);
        //     $old_data->image3 = $filename3;
        // }

        // if($request->file("image4")) {
        //     $file=$request->file("image4");
        //     $filename4=time().'_'.$file->getClientOriginalName();
        //     $path=public_path('photos/imagings/imaging_four');
        //     $img = Image::make($file->path());
        //     $img->resize(300, 300, function ($const) {
        //         $const->aspectRatio();
        //     })->save($path.'/'.$filename4);
        //     $old_data->image4 = $filename4;
        // }

        // if($request->file("image5")) {
        //     $file=$request->file("image5");
        //     $filename5=time().'_'.$file->getClientOriginalName();
        //     $path=public_path('photos/imagings/imaging_five');
        //     $img = Image::make($file->path());
        //     $img->resize(300, 300, function ($const) {
        //         $const->aspectRatio();
        //     })->save($path.'/'.$filename5);
        //     $old_data->image5 = $filename5;
        // }

        // if($request->file("image6")) {
        //     $file=$request->file("image6");
        //     $filename6=time().'_'.$file->getClientOriginalName();
        //     $path=public_path('photos/imagings/imaging_six');
        //     $img = Image::make($file->path());
        //     $img->resize(300, 300, function ($const) {
        //         $const->aspectRatio();
        //     })->save($path.'/'.$filename6);
        //     $old_data->image6 = $filename6;
        // }

        $image = $request->all();

        $imaging = Imaging::find($id);

        // $imaging->patient_id = $request->patient_id;
        // $imaging->doctor_id = $request->doctor_id;
        // $imaging->date_requested = $request->date_requested;
        // $imaging->date_analysis = $request->date_analysis;
        // $imaging->analysis = $request->analysis;
        // $imaging->conclusion = $request->conclusion;
        // $imaging->user_id = $request->user_id;
        // $imaging->save();

        return ApiResponse::success('Success',$image);
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
