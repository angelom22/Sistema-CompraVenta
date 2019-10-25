<?php

namespace App;

use App\Rol;
use App\TrUserRol;
use App\Model\TipoDocumento;

use Illuminate\Support\Collection;
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
        'id',
        'nombre', 
        'tipo_documento', 
        'num_documento', 
        'direccion', 
        'telefono', 
        'email', 
        'usuario', 
        'password', 
        'condicion',  
        'imagen'
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

    public function TipoDocumento(){
        return $this->hasOne(TipoDocumento::class, 'id', 'tipo_documento');
    }

    public function roles(){
        return $this->belongsToMany(Rol::class, 'tr_user_rol');
    }

    // public function TrUserRol(){
        
    //     return $this->hasMany(TrUserRol::class, 'id_user', 'id');
    // }


    public function hasRoles(array $roles)
    {
        foreach ($roles as $role) {
            // dd($role);
            $role = (int)$role;

            foreach($this->roles as $roles)
            {    
                if ($roles->id === $role)
                {
                    return true;
                }
            }            
            
        }

        return false;
    }

    public function isAdmin()
    {
       return $this->hasRoles(['1']);
    }


}
