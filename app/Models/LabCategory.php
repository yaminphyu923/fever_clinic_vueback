<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabCategory extends Model
{
    use HasFactory;
    protected $table = "lab_categories";
    protected $fillable = [
        "name",
        "user_id",
    ];
}
