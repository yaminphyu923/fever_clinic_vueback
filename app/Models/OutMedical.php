<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutMedical extends Model
{
    use HasFactory;

    protected $table = "out_medicals";
    protected $fillable = [
        "out_date",
        "out_quantity",
        "note",
        "approve_doctor",
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
        return $this->belongsTo(Doctor::class,"approve_doctor","id");
    }
}
