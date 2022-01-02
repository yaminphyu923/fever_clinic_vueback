<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use App\Models\MedicalList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RefillMedical extends Model
{
    use HasFactory;

    protected $table = "refill_medicals";
    protected $fillable = [
        "refill_date",
        "refill_quantity",
        "note",
        "doctor_id",
        "medical_list_id",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function medicalList(){
        return $this->belongsTo(MedicalList::class,"medical_list_id","id");
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,"doctor_id","id");
    }
}
