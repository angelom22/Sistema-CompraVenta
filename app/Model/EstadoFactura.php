<?php

namespace App\Model;
use App\Model\Compra;

use Illuminate\Database\Eloquent\Model;

class EstadoFactura extends Model
{
    protected $table = 'estado_facturas';
    
    protected $primaryKey = 'id_estado_factura';

    protected $fillable = [
        'id_estado_factura',
        'nombre'
    ];

    public $timestamps = false;

}
