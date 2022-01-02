<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imaging extends Model
{
    use HasFactory;
    protected $table = "imagings";
    protected $fillable = [
        "patient_id",
        "doctor_id",
        "date_requested",
        "date_analysis",
        "image1",
        "image2",
        "image3",
        "image4",
        "image5",
        "image6",
        "analysis",
        "conclusion",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,"patient_id","id");
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,"patient_id","id");
    }
}
