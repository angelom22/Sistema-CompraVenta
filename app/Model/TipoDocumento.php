<?php

namespace App\Model;
use App\User;
use App\Model\Proveedor;
use APP\Model\Cliente;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';

    protected $primaryKey = 'id';

    protected $fillable = ['letra_documento','descripcion'];

    public $timestamps = false;

    public function proveedor(){
        return $this->hasMany(Proveedor::class, 'tipo_documento', 'id');
    }

    public function cliente(){
        return $this->hasMany(Cliente::class, 'tipo_documento', 'id');
    }

    public function user(){
        return $this->hasMany(User::class, 'tipo_documento', 'id');
    }
}
