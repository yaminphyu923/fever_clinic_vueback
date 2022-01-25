<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discharge extends Model
{
    use HasFactory;

    protected $table = "discharges";
    protected $fillable = [
        "patient_id",
        "time",
        "place",
        "opd",
        "admission",
        "refer_to",
        "pr",
        "spo2",
        "bp",
        "gcs",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    // public function doctor(){
    //     return $this->belongsTo(Doctor::class,"doctor_id","id");
    // }

}
