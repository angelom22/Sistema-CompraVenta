<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UnidadMedicion extends Model
{
    protected $table = 'unidad_mediciones';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'letra',
        'cantidad',
        'descripcion'
    ];

    public $timestamps = false;
}
