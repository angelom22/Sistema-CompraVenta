<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrTipoPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_tipo_pago', function (Blueprint $table) {
            $table->integer('id_venta')->nullable()->unsigned();
            $table->integer('id_compra')->nullable()->unsigned();
            $table->integer('id_pago')->unsigned();

            $table->foreign('id_venta')->references('id_venta')->on('ventas')->onDelete('cascade');
            $table->foreign('id_compra')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('id_pago')->references('id_pago')->on('tipo_pago')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_tipo_pago');
    }
}
