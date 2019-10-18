<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleFacturaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura_compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idcompra')->unsigned();
            $table->integer('idproducto')->unsigned();
            $table->integer('cantidad');
            $table->decimal('precio',11,2);
            $table->integer('status')->unsigned();
            // $table->timestamps();
            
            $table->foreign('idcompra')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('idproducto')->references('id')->on('productos');
            $table->foreign('status')->references('id_estado_factura')->on('estado_facturas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_factura_compras');
    }
}
