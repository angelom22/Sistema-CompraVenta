<?php

namespace App\Model;

use App\Model\Venta;
use App\Model\Compra;
use App\Model\TipoPago;

use Illuminate\Database\Eloquent\Model;

class TrTipoPago extends Model
{
    protected $table = 'tr_tipo_pago';

    public $timestamps = false;

    protected $fillable = [
        'id_venta',
        'id_compra',
        'id_pago'
    ];

    public function Venta(){
        return $this->hasOne(Venta::class, 'id_venta', 'id_venta');
    }

    public function Compra(){
        return $this->hasOne(Compra::class, 'id_compra', 'id');
    }

    public function TipoPago(){
        return $this->hasOne(TipoPago::class, 'id_pago', 'id_pago');
    }
}
