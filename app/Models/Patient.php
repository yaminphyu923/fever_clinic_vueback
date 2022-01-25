<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patients";
    protected $fillable = [
        "name",
        "gender",
        "age",
        "dob",
        "nrc",
        "phone",
        "address",
        "nextKin",
        "attendent",
        "occupation",
        "symptoms",
        "travelHistory",
        "remark",
        "date",
        "como",
        "comobidity",
        "out_patient",
        "out_date",
        "dead",
        "dead_date",
        "refer",
        "edit_history",
        "user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
