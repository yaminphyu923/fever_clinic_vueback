<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\MedicalList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrescriptiveMedicine extends Model
{
    use HasFactory;

    protected $table = "prescriptive_medicines";
    protected $fillable = [
        "date",
        "patient_id",
        "doctor_id",
        "medical_list_id",
        "status",
        "user_id"
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

    public function medicalList(){
        return $this->belongsTo(MedicalList::class,"medical_list_id","id");
    }


}
