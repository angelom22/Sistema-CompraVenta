<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id_venta');
            $table->integer('idcliente')->unsigned();
            $table->integer('idusuario')->unsigned();
            $table->string('tipo_identificacion', 20);
            $table->string('num_venta', 10);
            $table->dateTime('fecha_venta');
            $table->integer('impuesto')->unsigned();
            $table->decimal('total', 65 ,2);
            $table->integer('estado')->unsigned();
            $table->integer('tipo_pago')->unsigned();
            $table->text('nota');
            $table->timestamps();
            
            $table->foreign('idcliente')->references('id')->on('clientes');
            $table->foreign('idusuario')->references('id')->on('users');
            $table->foreign('impuesto')->references('id')->on('impuesto');
            $table->foreign('tipo_pago')->references('id')->on('tipo_pago');
            $table->foreign('estado')->references('id_estado_factura')->on('estado_facturas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
