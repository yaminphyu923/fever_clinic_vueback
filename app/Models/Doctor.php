<?php

namespace App\Models;

use App\Models\Degree;
use App\Models\Speciality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $table = "doctors";
    protected $fillable = ["name","phone","degree_id","speciality_id","user_id"];

    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id','id');
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class,'speciality_id','id');
    }
}
