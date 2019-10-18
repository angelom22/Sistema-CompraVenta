<?php

namespace App\Model;

use App\User; 
use App\Model\Proveedor; 
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'idproveedor',
        'idusuario',
        'tipo_identificacion',
        'num_compra',
        'fecha_compra',
        'impuesto',
        'total',
        'estado'
    ];
    
    // es el usuario que ahce el registro
    public function usuario(){
        return $this->belongsTo(User::class,'idusuario','id');
    }

    // es el proveedor que hace la compra
    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'idproveedor','id');
    }

    //funcion para el estado de la factura 
}
 