<?php

namespace App\Models;

use App\Models\User;
use App\Models\MedicalCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalList extends Model
{
    use HasFactory;

    protected $table = "medical_lists";
    protected $fillable = [
        "name",
        "quantity",
        "in_date",
        "out_date",
        "out_quantity",
        "last_stock_date",
        "refill_date",
        "refill_quantity",
        "medical_category_id",
        "remain",
        "note",
        "user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function medicalcategory(){
        return $this->belongsTo(MedicalCategory::class,'medical_category_id','id');
    }
}
