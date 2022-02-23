<?php

namespace App\Models;

use App\Models\Time;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorDuty extends Model
{
    use HasFactory;
    protected $table = "doctor_duties";
    protected $fillable = ["date","time_id","doctor_id","note","user_id"];

    public function time(){
        return $this->belongsTo(Time::class,'time_id','id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
