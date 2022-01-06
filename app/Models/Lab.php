<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use App\Models\LabCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lab extends Model
{
    use HasFactory;

    protected $table = "labs";
    protected $fillable = ["name","unit","range","group_id","labcategory_id","user_id"];

    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function labCategory(){
        return $this->belongsTo(LabCategory::class,'labcategory_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
