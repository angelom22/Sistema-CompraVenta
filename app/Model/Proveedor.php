<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\TipoDocumento;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_empresa', 
        'responsable', 
        'tipo_documento', 
        'num_documento', 
        'direccion', 
        'telefono', 
        'email', 
        'imagen'
    ];

    public function TipoDocumento(){
        return $this->hasOne(TipoDocumento::class, 'id', 'tipo_documento');
    }
}
