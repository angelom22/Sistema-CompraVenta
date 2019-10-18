<?php

namespace App;

use App\Rol;
use App\Model\TipoDocumento;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre', 'tipo_documento', 'num_documento', 'direccion', 'telefono', 'email', 'usuario', 'password', 'condicion', 'idrol', 'imagen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Rol(){
        return $this->belongsTo(Rol::class,'idrol','id');
    }

    public function TipoDocumento(){
        return $this->hasOne(TipoDocumento::class, 'id', 'tipo_documento');
    }
}
