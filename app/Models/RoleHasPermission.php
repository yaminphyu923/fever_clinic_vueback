<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleHasPermission extends Model
{
    use HasFactory;
    protected $table = "role_has_permissions";
    protected $fillable = [
        "permission_id",
        "role_id"
    ];

    public function permission(){
        $this->belongsTo(Permission::class,'permission_id','id');
    }

    public function role(){
        $this->belongsTo(Role::class,'role_id','id');
    }
}
