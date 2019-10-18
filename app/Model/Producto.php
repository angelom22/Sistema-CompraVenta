<?php

namespace App\Model;
use App\Model\UnidadMedicion;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_categoria',
        'codigo',
        'nombre',
        'precio_venta',
        'precio_costo',
        'stock',
        'condicion', 
        'medicion',
        'imagen'
    ];

    public function medicion(){
        return $this->hasOne(EstadoFactura::class,'id','medicion');
    }
}
