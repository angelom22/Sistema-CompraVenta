<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    protected $table = 'tipo_pago';

    protected $primaryKey = 'id_pago';
    
    protected $fillable = [
        'nombre',
        'cantidad',
    ];

    public $timestamps = false;
}
