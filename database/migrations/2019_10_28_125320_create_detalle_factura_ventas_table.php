<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleFacturaVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_venta')->unsigned();
            $table->integer('idproducto')->unsigned();
            $table->integer('cantidad');
            $table->decimal('precio', 65, 2);
            $table->decimal('descuento', 11, 2);
            // $table->timestamps();

            $table->foreign('id_venta')->references('id_venta')->on('ventas')->onDelete('cascade');
            $table->foreign('idproducto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_factura_ventas');
    }
}
