<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = "diagnoses";
    protected $fillable = [
        "patient_id",
        "diagnosis",
        "dia",
        "information",
        "treatment",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
