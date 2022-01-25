<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dead extends Model
{
    use HasFactory;

    protected $table = "deads";
    protected $fillable = [
        "patient_id",
        "dead_time",
        "cause",
        "doctor_id",
        "note",
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
}
