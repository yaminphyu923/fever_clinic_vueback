<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hospital extends Model
{
    use HasFactory;
    protected $table="hospitals";
    protected $fillable = [
        "patient_id",
        "date",
        "admission",
        "bed_id",
        "doctor_multiple_id",
        "doctor_incharge_id",
        "police_case",
        "fever",
        "sore_throat",
        "chills",
        "shaking_chills",
        "headache",
        "taste_smell",
        "malaise",
        "odema",
        "date_onset",
        "date_covid",
        "refer_to",
        "others",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_multiple_id','id');
    }

    public function doctorIncharge(){
        return $this->belongsTo(Doctor::class,'doctor_incharge_id','id');
    }

    public function bed(){
        return $this->belongsTo(Bed::class,'bed_id','id');
    }
}
