<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remain extends Model
{
    use HasFactory;

    protected $table = "remains";
    protected $fillable = [
        "date",
        "remain",
        "withdraw",
        "note",
        "user_id",
        "user_id",
    ];
}
