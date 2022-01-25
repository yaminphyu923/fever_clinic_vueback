<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PastMedical extends Model
{
    use HasFactory;

    protected $table = "past_medicals";
    protected $fillable = [
        "patient_id",
        "dm",
        "ht",
        "ihd",
        "stroke",
        "renal",
        "liver",
        "bleeding",
        "como",
        "comobidity",
        "past",
        "drug",
        "drug_allergy",
        "last_meal",
        "smoking",
        "alcohol",
        "pregnancy",
        "recent_drugs",
        "regular_drugs",
        "medication",
        "system_enquery",
        "pre_hospital",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id','id');
    }
}
