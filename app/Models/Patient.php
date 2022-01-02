<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        "user_id",
    ];
}
