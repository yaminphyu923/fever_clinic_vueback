<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgressNote extends Model
{
    use HasFactory;

    protected $table = "progress_notes";
    protected $fillable = [
        "patient_id",
        "progress_note",
        "user_id",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
