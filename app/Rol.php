<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles'; 

    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'descripcion', 'condicion'];

    public $timestamps = false;

    public function users(){
        return $this->hasMany(User::class,'idrol','id');
    }
}
