<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_factura_ventas';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_venta',
        'idproducto',
        'cantidad',
        'precio',
        'descuento',
    ];

    public $timestamps = false;
}
