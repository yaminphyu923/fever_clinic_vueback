<?php

namespace App\Models;

use App\Models\Time;
use App\Models\User;
use App\Models\HRManagement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HRDuty extends Model
{
    use HasFactory;

    protected $table = "h_r_duties";
    protected $fillable = ["date","time_id","h_r_management_id","note","user_id"];

    public function time(){
        return $this->belongsTo(Time::class,'time_id','id');
    }

    public function hrManagement(){
        return $this->belongsTo(HRManagement::class,'h_r_management_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
