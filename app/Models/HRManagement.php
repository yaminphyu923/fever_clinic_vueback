<?php

namespace App\Models;

use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HRManagement extends Model
{
    use HasFactory;
    protected $table = "h_r_management";
    protected $fillable = [
        "name",
        "phone",
        "position_id",
        "user_id",
    ];

    public function position(){
        return $this->belongsTo(Position::class,"position_id","id");
    }
}
