<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\LabCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investigation extends Model
{
    use HasFactory;

    protected $table = "investigations";
    protected $fillable = [
        "patient_id",
        "doctor_id",
        "date_requested",
        "date_analysis",
        "doctor_test",
        "queue",
        "image",
        "exam_request",
        "note",
        "value",
        "remark",
        "lab_name",
        "lab_unit",
        "lab_range",
        "group_id",
        "labcategory_id",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,"doctor_id","id");
    }

    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function labCategory(){
        return $this->belongsTo(LabCategory::class,'labcategory_id','id');
    }
}
