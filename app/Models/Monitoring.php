<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = "monitorings";
    protected $fillable = [
        "patient_id",
        "pr",
        "crt",
        "emergency",
        "t",
        "spo2",
        "rbs",
        "gcs",
        "pupil",
        "bp",
        "urine",
        "date",
        "tx",
        "pain_score",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }


}
