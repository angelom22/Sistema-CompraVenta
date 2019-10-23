<?php

namespace App;

use DB;
use App\User;
use App\Rol;
use Illuminate\Database\Eloquent\Model;

class TrUserRol extends Model
{
   protected $table = 'tr_user_rol';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'rol_id',
    ];

    public function User(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function Rol(){
        return $this->hasOne(UserRoles::class, 'rol_id', 'id');
    }
}
