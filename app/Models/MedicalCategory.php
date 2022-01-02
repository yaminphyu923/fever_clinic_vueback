<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCategory extends Model
{
    use HasFactory;

    protected $table = "medical_categories";

    protected $fillable = [
        "name",
        "user_id",
    ];
}
