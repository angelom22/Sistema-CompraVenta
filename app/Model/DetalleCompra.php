<?php

namespace App\Model;

use App\Model\EstadoFactura;
use App\Model\Producto;
use App\Model\Impuesto;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalle_factura_compras';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'idcompra',
        'idproducto',
        'cantidad',
        'precio',
        'status'
    ];

    public $timestamps = false;

    public function producto(){
        return $this->belongsTo(Producto::class, 'idproducto', 'id');
    }

    public function compra(){
        return $this->belongsTo(Producto::class, 'idcompra', 'id');
    }

    public function estadoFactura(){
        return $this->hasOne(EstadoFactura::class,'id_estado_factura','status');
    }

    
}
