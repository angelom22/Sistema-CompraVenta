<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'tipo_documento', 'num_documento', 'direccion', 'telefono', 'email'];

    public function TipoDocumento(){
        return $this->hasOne(TipoDocumento::class, 'id', 'tipo_documento');
    }
}
