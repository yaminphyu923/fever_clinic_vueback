<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use App\Models\MedicalList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    use HasFactory;

    protected $table="hospitals";
    protected $fillable = [
        "patient_id",
        "note",
        "doctor_id",
        "pharmacy",
        "pre_date",
        "queue",
        "medical_list_id",
        "dose",
        "frequency",
        "start_date",
        "end_date",
        "remark",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function medicalList(){
        return $this->belongsTo(MedicalList::class,"medical_list_id","id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,"doctor_id","id");
    }
}
