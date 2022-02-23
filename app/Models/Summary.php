<?php

namespace App\Models;

use App\Models\Bed;
use App\Models\Room;
use App\Models\User;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Summary extends Model
{
    use HasFactory;
    protected $table = "summaries";
    protected $fillable = [
        "bed_id",
        "date",
        "user_id",
    ];

    public function bed(){
        return $this->belongsTo(Bed::class,'bed_id','id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id','id');
    }

    public function floor(){
        return $this->belongsTo(Floor::class,'floor_id','id');
    }

    public function building(){
        return $this->belongsTo(Building::class,'building_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
