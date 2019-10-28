<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_facturas', function (Blueprint $table) {
            $table->bigIncrements('id_estado_factura');
            $table->string('nombre')->unique();
            // $table->timestamps();

            $table->foreign('id_estado_factura')->references('estado')->on('compras');
            $table->foreign('id_estado_factura')->references('estado')->on('ventas');

            
        });
        
        DB::table('estado_facturas')->insert(array('id_estado_factura'=>'1','nombre' => 'Registrada')); //azul
        DB::table('estado_facturas')->insert(array('id_estado_factura'=>'2','nombre' => 'Anulada')); //rojo
        DB::table('estado_facturas')->insert(array('id_estado_factura'=>'3','nombre' => 'Pagada')); //verde
        DB::table('estado_facturas')->insert(array('id_estado_factura'=>'4','nombre' => 'Pendiente')); //naranja


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_facturas');
    }
}
