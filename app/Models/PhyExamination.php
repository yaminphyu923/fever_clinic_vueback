<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhyExamination extends Model
{
    use HasFactory;

    protected $table = "phy_examinations";
    protected $fillable = [
        "patient_id",
        "temperature",
        "ecg",
        "rbs",
        "spo2",
        "bp",
        "pr",
        "rr",
        "well_orientated",
        "pain",
        "voice",
        "no_response",
        "general",
        "head_neck",
        "chest",
        "abdomen_pelvic",
        "spine",
        "upper_right",
        "upper_left",
        "lower_right",
        "lower_left",
        "refer_case",
        "other",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
