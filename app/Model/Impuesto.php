<?php

namespace App\Model;

use App\Model\Compra;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    protected $table = 'impuesto';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'impuesto'
    ];

    public $timestamps = false;

    public function compra(){
        return $this->belongsTo(Compra::class, 'id', 'impuesto');
    }
}
 